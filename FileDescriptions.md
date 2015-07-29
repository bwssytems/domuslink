# domusLink file descriptions #

## Introduction ##

This document will help familiarize new developers with the purpose and contents of each file containing code.


## Details ##
| **Name** | **Description** |
|:---------|:----------------|
| admin    | Directory for holding administrative view controllers |
| config.php | domus.Link configuration settings |
| db       | Directory for holding domus.Link data files |
| doc      |Directory for holding domus.Link documentation files |
| error.php | Error display controller to display managed exceptions in domus.Link |
| events   | Directory for holding timers/triggers/macro view controllers |
| fileloc.php | Code to set default paths for file locations |
| include.php | Code to execute initial/global settings |
| index.php | Main domus.Link entry point |
| lang     | Directory for holding language files |
| lib      | Directory for holding classes and functions |
| login.php | Manage domus.Link security based on security level set in config.php |
| robots.txt | Instruction set for web robots - default is disallow of course |
| theme    | Directory for holding domus.Link skins |
| version.php | domus.Link global version setting |

./admin:
| **Name** | **Description** |
|:---------|:----------------|
| aliases.php |                 |
| floorplan.php |                 |
| frontend.php |                 |
| heyu.php |                 |
| reload.php |                 |
| utility.php |                 |

./db:
| **Name** | **Description** |
|:---------|:----------------|
| floorplan-dist |                 |
| modules  |                 |
| schedules |                 |

./doc:
| **Name** | **Description** |
|:---------|:----------------|
| CHANGES  |                 |
| INSTALL  |                 |
| LICENSE  |                 |
| README   |                 |
| heyuconf.htm |                 |
| screenshots |                 |
| x10.conf |                 |
| x10.sched |                 |

./doc/screenshots:
| **Name** | **Description** |
|:---------|:----------------|
| iphone-theme |                 |


./events:
| **Name** | **Description** |
|:---------|:----------------|
| macros.php |                 |
| timers.php |                 |
| timers\_macro.php |                 |
| triggers.php |                 |
| upload.php |                 |

./lang:
| **Name** | **Description** |
|:---------|:----------------|
| Dutch.php |                 |
| English.php |                 |
| French.php |                 |
| German.php |                 |
| Italian.php |                 |
| Portuguese.php |                 |
| Spanish.php |                 |
| Swedish.php |                 |
| scanLang.pl |                 |

./lib:
| **Name** | **Description** |
|:---------|:----------------|
| classes  |                 |
| func     |                 |

./lib/classes:
| **Name** | **Description** |
|:---------|:----------------|
| error.class.php |                 |
| global.class.php |                 |
| heyuconf.class.php |                 |
| heyusched.class.php |                 |
| heyusched.const.php |                 |
| location.class.php |                 |
| login.class.php |                 |
| scheduleelement.class.php |                 |
| scheduleelementfactory.class.php |                 |
| testschedelements.php |                 |
| timer.class.php |                 |
| tpl.class.php |                 |

./lib/func:
| **Name** | **Description** |
|:---------|:----------------|
| cmd.func.php |  Common function to execute commands |
| config.func.php |                 |
| debug.func.php | Debug library   |
| file.func.php | This function loads a file and returns the whole content |
| heyumgmt.func.php |                 |
| lang.func.php | Full Operating system language detection |
| macro.func.php | Receives macro name in format tv\_on or tv\_off strips and returns only alias name |
| misc.func.php | List's a specified directories contents, while excluding README files, ., .., and .svn |
| timer.func.php | This function generates the weekday's table. It can be used for viewing existing timers, adding new timers and editing |

./theme:
| **Name** | **Description** |
|:---------|:----------------|
| README   |                 |
| default  |                 |
| iPhone   |                 |

./theme/default:
| **Name** | **Description** |
|:---------|:----------------|
| default.css |                 |
| images   |                 |
| javascript |                 |
| tpl      |                 |

./theme/default/javascript:
| **Name** | **Description** |
|:---------|:----------------|
| browser\_detect.js | Browser Detect  v2.1.6 |
| popup.js |                 |