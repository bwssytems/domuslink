#! /usr/bin/perl

# simple perl script used to regen all language php file
# for developer usage only

use strict; 


my @LANGS = qw[Dutch.php French.php German.php Italian.php Portuguese.php Spanish.php Swedish.php];
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
	print "Verifying: $filename\n";
	my %currentDictonary = loadLanguageFile($filename);

	# parsing reference file
	my $newFileContent = "" ;
	open REFFILE,"$REF_LANGUAGE" or die("unable to open '$$REF_LANGUAGE'");
	while (<REFFILE>) {
		chomp; 
		my $line = $_;

		# check if line match $lang["token"] = "value";
		if ($line =~ /^\s*\$lang\[\"(.*)\"\]\s*\=\s*\"(.*)\"/) {
			
			my ($key,$message)=($1,$2);
			my $messageInCurrentLanguage = $currentDictonary{$key};
			
			unless ( defined $messageInCurrentLanguage ) {
				$line = "# PLEASE TRANSLATE $line";
				print "$line\n";
			} else {
				# add entry with good translation
				$line = qq{ \$lang[\"$key\"]="$messageInCurrentLanguage"; };
			}	
		}
		 
		$newFileContent .= "$line\n";
	}
	close REFFILE; 
	
	# write reorder and updated language file...
	mkdir "new";
	my $newFile =  "new/$filename"; 
	print "Creating : $newFile\n";

	open NEWFILE, ">" .$newFile;  
	print NEWFILE $newFileContent; 
	close NEWFILE;
	
}

# load reference file
my %referenceLanguage = loadLanguageFile($REF_LANGUAGE);

# verify others
foreach my $lang (@LANGS) {
	verify($lang, \%referenceLanguage);
}


