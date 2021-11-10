DROP TABLE IF EXISTS admin;

CREATE TABLE `admin` (
  `Admin_ID` int(255) NOT NULL,
  `Admin_FirstName` varchar(255) NOT NULL,
  `Admin_LastName` varchar(255) NOT NULL,
  `Admin_ContactNumber` varchar(255) NOT NULL,
  `Admin_Username` varchar(255) NOT NULL,
  `Admin_Email` varchar(255) NOT NULL,
  `Admin_Password` varchar(255) NOT NULL,
  PRIMARY KEY (`Admin_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO admin VALUES("0","Xyril Yee","Te","09468579568","Admin","xytco@gmail.com","0192023a7bbd73250516f069df18b500");


DROP TABLE IF EXISTS cart;

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `productname` varchar(242) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS cashier;

CREATE TABLE `cashier` (
  `cashier_id` int(10) NOT NULL AUTO_INCREMENT,
  `cashier_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`cashier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO cashier VALUES("1","Cashier","cashier","cashier","12345");


DROP TABLE IF EXISTS category;

CREATE TABLE `category` (
  `Category_ID` int(255) NOT NULL,
  `Category_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO category VALUES("1","Auto Parts");
INSERT INTO category VALUES("2","Electronics");
INSERT INTO category VALUES("3","Furniture");
INSERT INTO category VALUES("4","Hardware");
INSERT INTO category VALUES("5","Lightings");
INSERT INTO category VALUES("6","Motorcycle Parts");
INSERT INTO category VALUES("7","Plastic Wares");


DROP TABLE IF EXISTS collection;

CREATE TABLE `collection` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO collection VALUES("1","12/12/2020","RS-203300","IN-6207382","3","d","21");
INSERT INTO collection VALUES("2","12/12/2020","Walk In Customer","IN-4380052","500","paid","-500");
INSERT INTO collection VALUES("3","12/12/2020","RS-600020","IN-20027602","8000","paid","-272");
INSERT INTO collection VALUES("4","12/13/2020","RS-720226","IN-0323390","3920","1234-1234","0");
INSERT INTO collection VALUES("5","12/13/2020","RS-720226","IN-0323390","3920","1234-1234","-3920");
INSERT INTO collection VALUES("6","12/13/2020","RS-32326","IN-07630903","3920","2020-12-13","0");
INSERT INTO collection VALUES("7","12/13/2020","RS-2223303","IN-005282","3920","2233","0");


DROP TABLE IF EXISTS customer;

CREATE TABLE `customer` (
  `id` int(242) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(242) NOT NULL,
  `lastname` varchar(242) NOT NULL,
  `age` varchar(242) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_number` varchar(150) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO customer VALUES("1","Marie","Dela Cruz","35","Lanang, Davao City","09654123987","Regular","Active");
INSERT INTO customer VALUES("2","Joseph","Kim","21","Matina Pangi, Davao City","09574986325","Online Customer","Active");
INSERT INTO customer VALUES("3","Carrie","Villaflor","26","IT Park, Cebu City","09587468123","Online Customer","Active");
INSERT INTO customer VALUES("4","Erika","Arroyo","19","Ulas Crossing","09874623648","Regular","Active");
INSERT INTO customer VALUES("5","Dianne","Aknoy","30","134 St. Makati City","09684531269","Online Customer","Active");


DROP TABLE IF EXISTS customertype;

CREATE TABLE `customertype` (
  `Type_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Current_Type` varchar(255) NOT NULL,
  PRIMARY KEY (`Type_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO customertype VALUES("1","Online Customer");
INSERT INTO customertype VALUES("2","Regular Customer");


DROP TABLE IF EXISTS department;

CREATE TABLE `department` (
  `Department_ID` int(255) NOT NULL,
  `Department_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Department_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO department VALUES("1","Accounting Department");
INSERT INTO department VALUES("2","Logistics Department");
INSERT INTO department VALUES("3","Purchasing Department");
INSERT INTO department VALUES("4","Sales Department");
INSERT INTO department VALUES("5","Warehouse Department");


DROP TABLE IF EXISTS employee;

CREATE TABLE `employee` (
  `Employee_ID` int(4) NOT NULL AUTO_INCREMENT,
  `Employee_Firstname` varchar(50) NOT NULL,
  `Employee_Lastname` varchar(50) NOT NULL,
  `Employee_Username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Employee_Age` int(2) NOT NULL,
  `Employee_ContactNumber` int(20) NOT NULL,
  `Employee_Address` varchar(255) NOT NULL,
  `Employee_Department` varchar(50) NOT NULL,
  `Employee_Status` varchar(255) NOT NULL,
  `Employee_Password` varchar(50) NOT NULL,
  `OTP_Code` mediumint(50) NOT NULL,
  PRIMARY KEY (`Employee_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO employee VALUES("1","Jen","Lee","Cashier","jenlee@gmail.com","24","2147483647","Matina, Davao City","Sales Department","Active","dbb8c54ee649f8af049357a5f99cede6","544893");
INSERT INTO employee VALUES("2","Lisa","Kim","SalesHead","lisakim@gmail.com","0","0","hghgh","Sales Department","Active","e9803a706f81a40884b8aeafafb2cfd3","0");
INSERT INTO employee VALUES("3","Rose","Choi","WarehouseHead","rosechoi@gmail.com","0","0","davao city","Warehouse Department","Active","337b38e2f3bfe3bf7c11e4cd60835bfe","0");
INSERT INTO employee VALUES("4","Jish","Park","LogisticsHead","jishpark@gmail.com","0","0","","Logistic Department","Active","865fbb10cb936aa22cc16f0d16e4693d","0");
INSERT INTO employee VALUES("5","Ralph","Alquizar","PurchasingHead","ralphalquizar@gmail.com","0","0","","Purchasing Department","Active","$2y$10$kTmfyp.uYJ6.CTecmFt8DuMEi63w62B.z.luNvOrgTi","0");
INSERT INTO employee VALUES("6","Jefferson","Mutya","AccountingHead","jeffersonmutya@gmail.com","0","0","","Accounting Department","Active","dc2af307c55523ce42701dbe43880d35","498120");


DROP TABLE IF EXISTS inventory;

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `IMAGE` longblob NOT NULL,
  `quantity` int(11) NOT NULL,
  `Item_Sold` int(255) NOT NULL,
  `price` decimal(11,0) NOT NULL,
  `category` varchar(100) NOT NULL,
  `material` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `weight` int(20) NOT NULL,
  `description` varchar(246) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO inventory VALUES("1","Mandaue Foam","2-Seater Sofa Set","����
7s��Ï�~٭����=*�/Y�\0On�A��m�>���b�2޳����<��Z�cֽ:e��V��?����L��zve���+�W�y)�<��ir�X��j_��Q��>�?�n/�3Ń�6�V�:�R�����g�+���\\Q���~-OPm�pf�f�E�};Ԭս���oK̚m���ܳ�1u�u����6%�ߥ�T�B�C���6}�G�z�z����5�jŲm�q����;�Ք��_L�6D8Q)�s#\'�9�;-�ޟ���q�\\X^���3tݙ��l�꭮-,���B@�=:[�U�@�5o��#)��VFQr����qO̚o�V��[\\XE������;�Ɑ�-�7���:j����o0��m�T����?I̩��[\\Umqg�{�Y�%�eC�����*6]W?�S3(��c��>`����>`3p��>`����>`���\nr�rvʖ�N���aˊ�FG�U>�=���)�U�����U%��Z�qm�Uim�*ѝ��O�Ov��;\no�mU�-�mM����k.��|б�-�Z}�H��qjl�֪}3m�I(�9r��`�YiXGaM����%	�5R�q���:^b�t��ҩND��N�E\"�\n�LՇSu�ӭ��5O���j�	P[&Aa�7궥Vgz3NR�ٔ���˒Tِ�G��R�Jc,K2u��v2�MjZtU>�?��,�#���VӨI���Zd���F�N��D�����9\"6���ze$U���y}̷���� ���*��^Ԧ�VӪ?ƕ�X�+���:QƋz��%\nགྷ,���*R�D�\"_��ח��O�(����I��Jo�m)�X֑$N�B=d�7�H�k�jB��_��ח���2R�q�OՇ&J\'9�a����\nܒFF[F���n�kKh�<��\"T�J������׊?��w	���b$Ӫ��8Js������6/�ۆّ��hV��;�8�ėɤ�����BڝO�v\\X,�Y�_�Q5U�F�� ��W�\0��)?V�C^l_84���\n��3�Z	�?�W&A6�����
INSERT INTO inventory VALUES("2","Xin Camry Furniture","Table Set for Dining","����\0JFIF\0\0\0\0\0\0��dExif\0\0MM\0*\0\0\0\0\0\0\0\0\0�\0\0\0\0\0\0H\0\0\0\0\0\0\0\0\0�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0�\0\0\0\0\0\0\0�(\0\0\0\0\0\0\01\0\0\0\0 \0\0\0�2\0\0\0\0\0\0\0ԇi\0\0\0\0\0\0\0�\0\0 \0\0\0\0-��\0\0\'\0-��\0\0\'Adobe Photoshop CS6 (Macintosh)\02018:01:20 16:38:53\0\0�\0\0\0\0\00221�\0\0\0\0\0\0\0�\0\0\0\0\0\0��\0\0\0\0\0\0H\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0n\0\0\0\0\0\0v(\0\0\0\0\0\0\0\0\0\0\0\0\0~\0\0\0\0\0\0�\0\0\0\0\0\0\0H\0\0\0\0\0\0H\0\0\0����XICC_PROFILE\0\0\0HLino\0\0mntrRGB XYZ �\0\0	\0\01\0\0acspMSFT\0\0\0\0IEC sRGB\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\0\0\0\0\0�-HP  \0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0cprt\0\0P\0\0\03desc\0\0�\0\0\0lwtpt\0\0�\0\0\0bkpt\0\0\0\0\0rXYZ\0\0\0\0\0gXYZ\0\0,\0\0\0bXYZ\0\0@\0\0\0dmnd\0\0T\0\0\0pdmdd\0\0�\0\0\0�vued\0\0L\0\0\0�view\0\0�\0\0\0$lumi\0\0�\0\0\0meas\0\0\0\0\0$tech\0\00\0\0\0rTRC\0\0<\0\0gTRC\0\0<\0\0bTRC\0\0<\0\0text\0\0\0\0Copyright (c) 1998 Hewlett-Packard Company\0\0desc\0\0\0\0\0\0\0sRGB IEC61966-2.1\0\0\0\0\0\0\0\0\0\0\0sRGB IEC61966-2.1\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0XYZ \0\0\0\0\0\0�Q\0\0\0\0�XYZ \0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0XYZ \0\0\0\0\0\0o�\0\08�\0\0�XYZ \0\0\0\0\0\0b�\0\0��\0\0�XYZ \0\0\0\0\0\0$�\0\0�\0\0��desc\0\0\0\0\0\0\0IEC http://www.iec.ch\0\0\0\0\0\0\0\0\0\0\0IEC http://www.iec.ch\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0desc\0\0\0\0\0\0\0.IEC 61966-2.1 Default RGB colour space - sRGB\0\0\0\0\0\0\0\0\0\0\0.IEC 61966-2.1 Default RGB colour space - sRGB\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0desc\0\0\0\0\0\0\0,Reference Viewing Condition in IEC61966-2.1\0\0\0\0\0\0\0\0\0\0\0,Reference Viewing Condition in IEC61966-2.1\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0view\0\0\0\0\0��\0_.\0�\0��\0\0\\�\0\0\0XYZ \0\0\0\0\0L	V\0P\0\0\0W�meas\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0�\0\0\0sig \0\0\0\0CRT curv\0\0\0\0\0\0\0\0\0\0\0\n\0\0\0\0\0#\0(\0-\02\07\0;\0@\0E\0J\0O\0T\0Y\0^\0c\0h\0m\0r\0w\0|\0�\0�\0�\0�\0�\0�\0�\0�\0�\0�\0�\0�\0�\0�\0�\0�\0�\0�\0�\0�\0�\0�\0�\0�\0�
INSERT INTO inventory VALUES("3","Daihatsu Motor Co., Ltd.","Car Wheel","����\0JFIF\0\0\0\0\0\0��\0C\0\n\n\n		\n%# , #&\')*)-0-(0%()(��\0C\n\n\n\n(((((((((((((((((((((((((((((((((((((((((((((((((((��\0�\"\0��\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\0\0\0\0�@\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0R�f|f��`�\"�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0gs�dy�9��|.�{U\"a�t87�]^bH豠Zx�\0��+W�}.n���C�%�oF^�\n\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0h�r<�;�W9��`&c:)c%{d#Z����\'�Z8�a�L�ڵ�g^#:-��{5+��|�n>�9ފ�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0�����ye��`�X8*1���K��91O$r
INSERT INTO inventory VALUES("4","Galaxy and Global Hardware","Oil Pan","����\0JFIF\0\0\0\0\0\0��\0�\0		\n\n	\n\n
INSERT INTO inventory VALUES("5","Galaxy and Global Hardware","Camshaft","����\0JFIF\0\0\0\0\0\0��\0�\0				
RRD�ׇ�����1�\"�K�W�������X��-z��+�B�A����n�}\\�ֹjU�W.tӎ\n�奤��vB5�:�Ő�����%»�c�Õ�&n[&��H�S1��&1�+H�2�8�H�Ӎ�x�5����Q�!;�d����js�0�~��c�����{	T�b��(�J���1�a�5��Ե�v�|h?	����Dt�������(8��\"���Gp؇~���o�������
INSERT INTO inventory VALUES("6","Luxdezine Philippines","Tupperware Set","����\0JFIF\0\0\0\0\0\0��\0�\0		\n\n	\n\n
TXQ����S����L�i�6��(Gf��.�P�s��1{B���u
Mxdus�$f����&;6�cM��w�FE�SK�n�@V^V�+�\0���E�u�!��K��ˍ���~I�\\#`TY��ѷgr�g��\0>~>}Gm(����v�G�F�X|C�H�6��(v�(\nϒ����9�j�Pz����#�5TW���)41H� A[�]��k��lj<r:�0�K���\0�ʪ���	$�����fx���DX4�p>B�^��uS�慚���\0�ˉ2c����;4\"����P##���	��A���s>�%B*��ɔUE�(��j���FL����!h��L�b~��]\n��~���*9р��]RE�µ\0�;����#NhvNu��Z�搃��#�`:RH����]�˶��-���V���Z�k��$�����A���3~9>
��RA���F��N��N�v?�A�Y������q(��\\M�%�𥏶bTC�[��Ez��J	�9\n�,�o�I�\0�|��\\M�����н�IfAB|���R�s��A[��eª�D�;�����l��D����to�H�����4�w4���b�2V�u�I��W�8A.\"�1`Gfw�����.De�\0B}3|P��n�����6�_�C��(�V�1p����]	{�Q�����(���|�����e�m���oN�_�%s����q�ɬђ1�Z�V�F?�������M�����M�P���o�d����Ј�^g$�s?d�C���Yh$^�B��hd�ߨƉ��a2E�Z�(v�\'Ġ�:��hh!��S����\n��%�		xjn.��:M���v;y(��9� �\nU�1U>�F~�c.X�UAM.ߤ��4���c&��ތS�X�w�!Թ<�68C�	�p��abN���&\n�&Y�$��c��L̬Y<�\0���Թ����q1(,���y\n����*�sD^ld�X��>]Hl��?LBXun/�ڒ��v
^@�{P���~��jT�2�2�?���S��p%�B���j�O���+n���\0}K��t�SDv��I6e��{�D�d�	�	r�x��U�SR�L�̩R�L���zx�D�R�J�* j�ݣ|}b�W�v�OZ�{�6��n:�h�5i2iZ��\\	�wa�MYj��F����P�?����㗆���n%�|s��&}�H;���,g��>�+�ܞY�8�܏�h\'_r��:d>�uPUq��yE��G%Ӈ)��M�KN������yB���=F`��~{�K��[�����n����ĳ��5!�	��zc�J�+�t�R��\0���fĶ\\�}36�ݏ(��b\0�!=1�4�މ�ʆ�\"[���`�ٮ߂\\�j�_`����>i�\'/����
;n���A���R��#�\'���r��{�c� ���D��j6��d:Ph���p�/��_�Q�c������5��HU�Ǣ���v��kv��p�=�?�#h�ُ�\0fP�S��\"Wӹ`����g��j��SOsy�/Z�`jS�bd08��WW�2��\"�\'t�D���f
INSERT INTO inventory VALUES("7","Mandaue Foam","Tumbler","����\0JFIF\0\0\0\0\0\0��\0C\0\n\n\n
INSERT INTO inventory VALUES("8","Sanya King Long Home Furnishings Square","Kitchen Cabinet","����\0JFIF\0\0H\0H\0\0��pPhotoshop 3.0\08BIM%\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\08BIM:\0\0\0\0\0�\0\0\0\0\0\0\0\0\0\0\0printOutput\0\0\0\0\0\0\0PstSbool\0\0\0\0Inteenum\0\0\0\0Inte\0\0\0\0Clrm\0\0\0printSixteenBitbool\0\0\0\0printerNameTEXT\0\0\0\0\0\0\0\0printProofSetupObjc\0\0\0\0P\0r\0o\0o\0f\0 \0S\0e\0t\0u\0p\0\0\0\0\0\nproofSetup\0\0\0\0\0\0\0Bltnenum\0\0\0builtinProof\0\0\0	proofCMYK\08BIM;\0\0\0\0-\0\0\0\0\0\0\0\0\0\0\0printOutputOptions\0\0\0\0\0\0\0Cptnbool\0\0\0\0\0Clbrbool\0\0\0\0\0RgsMbool\0\0\0\0\0CrnCbool\0\0\0\0\0CntCbool\0\0\0\0\0Lblsbool\0\0\0\0\0Ngtvbool\0\0\0\0\0EmlDbool\0\0\0\0\0Intrbool\0\0\0\0\0BckgObjc\0\0\0\0\0\0\0\0\0RGBC\0\0\0\0\0\0\0Rd  doub@o�\0\0\0\0\0\0\0\0\0Grn doub@o�\0\0\0\0\0\0\0\0\0Bl  doub@o�\0\0\0\0\0\0\0\0\0BrdTUntF#Rlt\0\0\0\0\0\0\0\0\0\0\0\0Bld UntF#Rlt\0\0\0\0\0\0\0\0\0\0\0\0RsltUntF#Pxl@R\0\0\0\0\0\0\0\0\0\nvectorDatabool\0\0\0\0PgPsenum\0\0\0\0PgPs\0\0\0\0PgPC\0\0\0\0LeftUntF#Rlt\0\0\0\0\0\0\0\0\0\0\0\0Top UntF#Rlt\0\0\0\0\0\0\0\0\0\0\0\0Scl UntF#Prc@Y\0\0\0\0\0\0\0\0\0cropWhenPrintingbool\0\0\0\0cropRectBottomlong\0\0\0\0\0\0\0cropRectLeftlong\0\0\0\0\0\0\0
�p
INSERT INTO inventory VALUES("9","Sanya Jujia Office Furniture Limited Company","Pitcher","����\0JFIF\0\0`\0`\0\0��\0C\0\n\n\n\n
>UC�Gۙ�\0H�}���v�q�â>U��/B� @\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0�H`aj����wۼj������aB9y0�_���_�GM�X�<\"�y������-KO�/F0�!�TWܙbŋ�2�9}\nc���r��)a�[Q����=�����a�Q�˛{~�W��rI��f���mm�M��׫~7�j�k���V���l�vm��L��qӏ\n_�y�����3��\0��y;��ϯ�\"������
INSERT INTO inventory VALUES("10","Galaxy and Global Hardware","Spring Hinges","�PNG
c��EߨE�\\ܵ����&�&��I�_�Y0K��1�`q�F���V�`&���\"{ٛn�-���>q�]|�+.��<�e_�D=����28���\"A�N��R���:tf(ld�0��J���fH\n����@z�P��a��D�Y\n�c8��0����Ѫn?N\nȱN }�\'�jB��V������������k���H�؊H��G��bx����.BO���!�
INSERT INTO inventory VALUES("11","ICS Convention Design, Inc.","Support Stick","����\0JFIF\0\0d\0d\0\0��\0C\0��\0C��\0��\0��\0\0\0\0\0\0\0\0\0\0\0\0\0\0	\n��\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\0\0\0\0��\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0(Q5E M�\0b+*�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0�[
q\'ʜfrd�|94��f�k�.?)	뽱�T ��4�S���}�g�\'?^ Q�AO8�MT�H<52\"�Z���ҵ�EY�Pضbr�F�Q���T�Qe�K�,\"S����c��Q�^萭����\0u��-=�TY*SZ�!y\n�Ք�TE��.?ވI?��)��1��\"�F�ӗȷ�p�\n��\0��==��k�y�~��K���O=\\�/Fhr�8}±=��ۯ�]���PRc��s\"��*J��������.�P��}*�x
INSERT INTO inventory VALUES("12","Eura Co., Ltd.","Front Spoiler","����\0JFIF\0\0\0\0\0\0��\0;CREATOR: gd-jpeg v1.0 (using IJG JPEG v80), quality = 85\n��\0C\0	!\"$\"$��\0C��\0�\0\"\0��\0\0\0\0\0\0\0\0\0\0\0	\n��\0�\0\0\0}\0!1AQa\"q2���#B��R��$3br�	\n%&\'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz���������������������������������������������������������������������������\0\0\0\0\0\0\0\0	\n��\0�\0\0w\0!1AQaq\"2�B����	#3R�br�\n$4�%�&\'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz��������������������������������������������������������������������������\0\0\0?\0��\n�P\0����1K@;�H)E\0���Q@	�Q�KF(\0�ct��ъZNhH��:�f�\0(��PQ�(��^Ԕ\0�sK�}7ڀ�%;����@
INSERT INTO inventory VALUES("13","Eura Co., Ltd.","Rear Spoiler","����\0JFIF\0\0\0\0\0\0��\0;CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 90\n��\0C\0\n\n\n
��V\\eC����v��G�M\'�~�\"��������g�N���Xh�U�E�����W$t�ڦ�sgi�M����-/�I1��z���|FQ��b]̾F���H�\0�y����h<T����-w6��{�Lo�9���\0Z���O�㏀��\"�/.%�߄�}f��Q������Lr��
INSERT INTO inventory VALUES("14","Taworn Electronic Components Co.,LTD.","Trunk Boot","����\0JFIF\0\0H\0H\0\0��\02Processed By eBay with ImageMagick, z1.1.0. ||B2��\0C\0		\n


DROP TABLE IF EXISTS inventory_report;

CREATE TABLE `inventory_report` (
  `Inventory_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Total` decimal(65,0) NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY (`Inventory_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO inventory_report VALUES("1","3482489","2021-05-17 15:03:49");
INSERT INTO inventory_report VALUES("2","3482489","2021-05-17 15:03:49");
INSERT INTO inventory_report VALUES("3","3482489","2021-05-17 15:04:58");
INSERT INTO inventory_report VALUES("4","3482489","2021-05-17 15:05:03");
INSERT INTO inventory_report VALUES("5","2725754","2021-06-20 20:57:30");


DROP TABLE IF EXISTS loginlogs;

CREATE TABLE `loginlogs` (
  `id` int(50) NOT NULL,
  `ipAddress` varchar(50) NOT NULL,
  `TryTime` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS lose;

CREATE TABLE `lose` (
  `p_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(30) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `description_name` varchar(30) NOT NULL,
  `amount_lose` varchar(30) NOT NULL,
  `qty` varchar(30) NOT NULL,
  `cost` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `exdate` varchar(30) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO lose VALUES("2","P-023822","Sofa","2 meters","6000","2","3000","12-13-2020","Select Category","");
INSERT INTO lose VALUES("3","P-023822","Sofa","2 meters","3000","1","3000","12-13-2020","Furnitures","0");
INSERT INTO lose VALUES("4","P-33898","Bulb","light","100","1","100","12-13-2020","Lightings","");


DROP TABLE IF EXISTS products;

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description_name` varchar(50) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `qty_left` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date_delivered` varchar(20) NOT NULL,
  `expiration_date` varchar(20) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO products VALUES("5","P-023822","Sofa","2 meters","Per Pack","3000","3500","SamYa","11","Select Category","2020-12-13","0");
INSERT INTO products VALUES("6","P-33898","Bulb","light","Per Pieces","100","150","Galaxy","0","Lightings","2020-12-13","0");


DROP TABLE IF EXISTS purchases;

CREATE TABLE `purchases` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(100) NOT NULL,
  `date_order` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `date_deliver` varchar(100) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `qty` varchar(30) NOT NULL,
  `cost` varchar(30) NOT NULL,
  `status` varchar(25) NOT NULL,
  `remark` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO purchases VALUES("2","PO-333030","2020-12-12","SamYa","","P-023822","4","14000","","");


DROP TABLE IF EXISTS purchases_item;

CREATE TABLE `purchases_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO purchases_item VALUES("2","P-023822","4","14000","PO-333030","","2020-12-12");


DROP TABLE IF EXISTS sales;

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(242) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS sales_order;

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date` varchar(25) NOT NULL,
  `omonth` varchar(25) NOT NULL,
  `oyear` varchar(25) NOT NULL,
  `qtyleft` varchar(25) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `vat` varchar(20) NOT NULL,
  `total_amount` varchar(30) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO sales_order VALUES("7","RS-253322","P-33898","1","150","Bulb","150","0","Lightings","12/12/2020","December","2020","1","light","18","168");
INSERT INTO sales_order VALUES("8","RS-62322333","P-023822","1","3500","Sofa","3500","0","Select Category","12/12/2020","December","2020","28","2 meters","420","3920");
INSERT INTO sales_order VALUES("9","RS-9222","P-023822","2","6910","Sofa","3500","45","Select Category","12/12/2020","December","2020","26","2 meters","829.2","7739.2");
INSERT INTO sales_order VALUES("10","RS-600020","P-023822","2","6900","Sofa","3500","50","Select Category","12/12/2020","December","2020","24","2 meters","828","7728");
INSERT INTO sales_order VALUES("11","RS-023322","P-023822","1","3500","Sofa","3500","0","Select Category","12/13/2020","December","2020","23","2 meters","420","3920");
INSERT INTO sales_order VALUES("12","RS-2832232","P-023822","1","3500","Sofa","3500","0","Select Category","12/13/2020","December","2020","22","2 meters","420","3920");
INSERT INTO sales_order VALUES("13","RS-235003","P-023822","1","3500","Sofa","3500","0","Select Category","12/13/2020","December","2020","21","2 meters","420","3920");
INSERT INTO sales_order VALUES("14","RS-3732223","P-023822","1","3500","Sofa","3500","0","Select Category","12/13/2020","December","2020","20","2 meters","420","3920");
INSERT INTO sales_order VALUES("15","RS-22235322","P-023822","1","3500","Sofa","3500","0","Select Category","12/13/2020","December","2020","17","2 meters","420","3920");
INSERT INTO sales_order VALUES("16","RS-32326","P-023822","1","3500","Sofa","3500","0","Select Category","12/13/2020","December","2020","16","2 meters","420","3920");
INSERT INTO sales_order VALUES("17","RS-720226","P-023822","1","3500","Sofa","3500","0","Select Category","12/13/2020","December","2020","15","2 meters","420","3920");
INSERT INTO sales_order VALUES("18","RS-03203345","P-023822","1","3500","Sofa","3500","0","Select Category","12/13/2020","December","2020","13","2 meters","420","3920");
INSERT INTO sales_order VALUES("19","RS-3302803","P-023822","1","3500","Sofa","3500","0","Select Category","12/13/2020","December","2020","12","2 meters","420","3920");
INSERT INTO sales_order VALUES("20","RS-2223303","P-023822","1","3500","Sofa","3500","0","Select Category","12/13/2020","December","2020","11","2 meters","420","3920");


DROP TABLE IF EXISTS sales_report;

CREATE TABLE `sales_report` (
  `Sales_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Total` decimal(65,0) NOT NULL,
  `Transaction_Date` varchar(255) NOT NULL,
  PRIMARY KEY (`Sales_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS status;

CREATE TABLE `status` (
  `Status_ID` int(255) NOT NULL,
  `Current_Status` varchar(255) NOT NULL,
  PRIMARY KEY (`Status_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO status VALUES("1","Active");
INSERT INTO status VALUES("2","Inactive");


DROP TABLE IF EXISTS supliers;

CREATE TABLE `supliers` (
  `suplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  PRIMARY KEY (`suplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO supliers VALUES("3","Galaxy","Japan","12345","John Doe");
INSERT INTO supliers VALUES("4","Global Hardwares","Japan","0988348","Stephen Paysu");
INSERT INTO supliers VALUES("5","AutoMotors","Japan","09863","Ahm Bhot");
INSERT INTO supliers VALUES("6","SamYa","China","634896","Kate Ten");
INSERT INTO supliers VALUES("7","Samya","Mandawi, Philippines","634601","Hayk Keng");


DROP TABLE IF EXISTS supplier;

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(110) NOT NULL,
  `address` varchar(110) NOT NULL,
  `contact_number` varchar(110) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO supplier VALUES("1","Xin Camry Furniture","China, Hainan, Sanya, Hairun Rd","89888650867","Active");
INSERT INTO supplier VALUES("2","Sanya King Long Home Furnishings Square","363 Lizhigou Rd, Jiyang District, Sanya, Sanya, Hainan, China","89888380057","Active");
INSERT INTO supplier VALUES("3","Sanya Jujia Office Furniture Limited Company","Huixin Alley, Tianya District, Sanya, Hainan, China","89838200881","Active");
INSERT INTO supplier VALUES("4","Mandaue Foam","Hernan Cortes Street, Mandaue City, 6014 Cebu","0323438802","Active");
INSERT INTO supplier VALUES("5","Luxdezine Philippines","MC HOME DEPOT 34th st. cor Justicia Drive Bonifacio Global City, Taguig, 1634 Metro Manila","0288103487","Active");
INSERT INTO supplier VALUES("6","Galaxy and Global Hardware","Shibuya City, Tokyo, Japan","1234567890","Active");
INSERT INTO supplier VALUES("7","Daihatsu Motor Co., Ltd.","1-13, Higashiueno 2-chome, Daito-ku, Tokyo, 110-0015 Japan","81358283501","Active");
INSERT INTO supplier VALUES("8","Eura Co., Ltd.","4-13-17 Hoji, 3-30-18 Miyamae, Suginami-Ku, Tokyo","810667244744","Active");
INSERT INTO supplier VALUES("9","ICS Convention Design, Inc.","Chiyoda Bldg. 1-5-18 Sarugakucho Chiyoda-Ku","81332193561","Active");
INSERT INTO supplier VALUES("10","Taworn Electronic Components Co.,LTD.","Bangkok 10240, Thailand","6621864929","Active");


DROP TABLE IF EXISTS transaction;

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `total` decimal(11,0) NOT NULL,
  `logistics` varchar(255) NOT NULL,
  `type` varchar(242) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `_dateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO transaction VALUES("1","2586","Deliver","Walk-In","Carrie Villaflor","2021-05-17 08:14:00");
INSERT INTO transaction VALUES("2","25215","Deliver","Walk-In","Marie Dela Cruz","2021-05-17 02:22:00");
INSERT INTO transaction VALUES("3","729","Pick-Up","Walk-In","","2021-05-17 02:24:00");
INSERT INTO transaction VALUES("4","3786429","Pick-Up","Regular","Dianne Aknoy","2021-05-17 02:32:00");
INSERT INTO transaction VALUES("5","356786","Pick-Up","Walk-In","Ralph","2021-05-17 02:38:00");
INSERT INTO transaction VALUES("6","389","Pick-Up","Walk-In","","2021-05-17 05:30:00");
INSERT INTO transaction VALUES("7","835732","Pick-Up","Walk-In","","2021-05-17 11:59:00");
INSERT INTO transaction VALUES("8","2293","Pick-Up","Walk-In","Dohyun","2021-05-18 02:10:00");
INSERT INTO transaction VALUES("9","503750","Pick-Up","Walk-In","","2021-07-09 09:34:00");
INSERT INTO transaction VALUES("10","38750","Pick-Up","Walk-In","","2021-07-09 10:44:00");
INSERT INTO transaction VALUES("11","75000","Pick-Up","Walk-In","","2021-07-09 10:46:00");
INSERT INTO transaction VALUES("12","375000","Pick-Up","Walk-In","","2021-07-09 10:53:00");


DROP TABLE IF EXISTS user;

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("1","admin","admin123","Admin","Admin");

