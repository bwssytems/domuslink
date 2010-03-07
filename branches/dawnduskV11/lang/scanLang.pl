#! /usr/bin/perl

# simple perl script used to regen all language php file
# for developer usage only

use strict; 


my @LANGS = qw[Dutch.php French.php German.php Italian.php Portuguese.php Spanish.php Swedish.php];
my %ignore = ( "dlurl" => 1, "title" => 1);

my $REF_LANGUAGE = "English.php";

# load a languageFile return hashtable with found language
sub loadLanguageFile($) {
	my ($filename) = (@_);
	my %dictionary;
	open FILE,"$filename" or die("unable to open '$filename'");
	while (<FILE>) {
		chomp; 
		my $line = $_;
		# check if line match $lang["token"] = "value";
		if ($line =~ /^\s*\$lang\[\"(.*)\"\]\s*\=\s*\"(.*)\"/) {
			$dictionary{$1}=$2; 
		}
	}

	my $loaded = keys %dictionary;
	print "$filename : found $loaded messages\n";
	return %dictionary;
}

# verify a language file : 
#  read reference file, foreach message found verify if defined in current language
#  remove orphan entries
#  generate a new file (same order than reference file)
sub verify($$) {
	my ($filename,$rh_reference) = @_; 
	print "\n\n= VERIFIYING : $filename =\n";
	my %currentDictonary = loadLanguageFile($filename);

	# parsing reference file
	my $newFileContent = "" ;
	open REFFILE,"$REF_LANGUAGE" or die("unable to open '$$REF_LANGUAGE'");
	my @toTranslate;
	my @toVerify;
	
	while (<REFFILE>) {
		s/\n//g; # Remove line feeds
		s/\r//g; # Remove carriage returns 
		my $line = $_;

		# check if line match $lang["token"] = "value";
		if ($line =~ /^\s*\$lang\[\"(.*)\"\]\s*\=\s*\"(.*)\"/) {
			
			my ($key,$message)=($1,$2);
			my $messageInCurrentLanguage = $currentDictonary{$key};
			my $messageInEnglish         = $$rh_reference{$key};
			
			unless ( defined $messageInCurrentLanguage ) {
				$line = "$line // PLEASE TRANSLATE";
				push @toTranslate, $line;
			} else {
				# add entry with good translation
				if ($messageInCurrentLanguage eq $messageInEnglish) {
					if (!defined($ignore{$key} )) {
						push @toVerify, $line;
					}
				}
				$line = qq{ \$lang[\"$key\"]="$messageInCurrentLanguage"; };
			}	
		}
		 
		$newFileContent .= "$line\n";
	}
	
	printArray(\@toTranslate,"to translate");
	printArray(\@toVerify,"to verify");
	
	close REFFILE; 
	
	# write reorder and updated language file...
	mkdir "new";
	my $newFile =  "new/$filename"; 
	print "Creating : $newFile\n";

	open NEWFILE, ">" .$newFile;  
	print NEWFILE $newFileContent; 
	close NEWFILE;
	
}


sub printArray($$) {
	my ($rArray,$title) = @_;
	my $count = @$rArray;
	print "\n $title / $count message(s)\n";
	foreach (@$rArray) {
		print "  $_\n";
	}	
}

# load reference file
my %referenceLanguage = loadLanguageFile($REF_LANGUAGE);

# verify others
foreach my $lang (@LANGS) {
	verify($lang, \%referenceLanguage);
}
