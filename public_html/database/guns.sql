CREATE DATABASE `lockeythings`;

CREATE TABLE `Guns`(
   `gunid` int(11) NOT NULL AUTO_INCREMENT,
   `maker` varchar(20) NOT NULL,
   `name`  varchar(40) NOT NULL,
   `size` int(2) NOT NULL,
   `type` int(1) NOT NULL,      /* 1= Laser, 2= Physical, 3= Distortion, 4= Neutron, 5=Plasma */
   `mass` int(5) NOT NULL,
   `hp` int(5) NOT NULL,
	`pspeed` int(5) NOT NULL,
	`maxrange` int(5) NOT NULL,
	`ammocount` int(5) NOT NULL,
	`rof` int(4) NOT NULL,
	`pdamage` int(5) NOT NULL,
	`edamage` int(5) NOT NULL,
	`ddamage` int(5) NOT NULL,
	`powercap` decimal(8,2) NOT NULL,
	`powerpershot` decimal(8,2) NOT NULL,
	`heatcap` decimal(8,2) NOT NULL,
	`heatpershot` decimal(8,2) NOT NULL,
	`voyprice` int(6) NOT NULL,
	`desc` LONGTEXT NOT NULL,
   PRIMARY KEY (`gunid`),
   UNIQUE KEY `gunid_UNIQUE` (`gunid`)
   )ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
   

INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','Omnisky III Laser Cannon','AMRS','1','150','900','12000','100','0','1794','1650','0','85','0','1800.00','24.80','144.00','9.70','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','WEAK Laser Cannon','Vanduul Raider','1','150','1250','0','120','0','1900','1805','0','70','0','1800.00','19.90','144.00','7.80','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','BEHR M3A Laser Cannon','BEHR','1','150','1100','0','140','0','1958','1821','0','65','0','1800.00','16.50','144.00','6.50','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','NN-13 Neutron Cannon','MXOX','1','150','950','0','95','0','1600','1440','0','95','0','1800.00','23.20','144.00','9.10','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','CF-007 Bulldog Repeater','KLWE','1','150','1050','8000','325','0','1800','1440','0','30','0','1800.00','8.60','144.00','3.40','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('2','9-Series Longsword','KBAR','1','150','850','4000','110','400','1650','1403','85','0','0','9999.00','1.00','144.00','7.602','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('3','Suckerpunch Distortion Cannon','JOKR','1','150','875','0','105','0','1900','1672','0','0','110','1800.00','21.40','144.00','8.40','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('2','SW16BR2 Sawbuck','BEHR','2','200','2250','0','280','400','1500','1665','32','0','0','9999.00','1.00','173.00','4.10','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('2','APAR Mass Driver','APAR','2','200','2100','0','60','120','2200','3080','210','0','0','9999.00','1.00','173.00','12.60','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','Omnisky VI Laser Cannon','AMRS','2','200','1900','0','90','0','1975','2666','0','135','0','2160.00','20.80','173.00','8.20','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('2','Tarantula GT-870','GATS','2','200','2050','0','130','600','1700','2890','100','0','0','9999.00','1.00','173.00','5.60','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','NN-14 Neutron Cannon','MXOX','2','200','1900','0','85','0','1650','2046','0','168','0','2160.00','22.60','168.00','8.90','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','M4A Laser Cannon','BEHR','2','200','2100','0','130','0','1985','2719','0','110','0','2160.00','14.70','173.00','5.80','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('2','KLWE Mass Driver S2','KLWE','2','200','1950','8000','75','120','2198','3011','190','0','0','9999.00','1.00','173.00','10.00','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('2','Scorpion GT-215','GATS','2','200','2300','0','900','1000','1400','1218','22','0','0','9999.00','1.00','173.00','1.10','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('2','Tigerstreik T-19P','KRIG','2','200','2000','0','950','500','1400','1218','22','0','0','9999.00','1.00','172.00','1.10','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','CF-117 Badger Repeater','KLWE','2','200','2100','0','300','0','1825','1862','0','52','0','2160.00','9.20','173.00','3.60','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','Behring MVSA Laser Cannon','BEHR','2','200','2000','0','155','0','1986','2443','0','135','0','2360.00','12.80','182.00','5.00','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('2','AMRS PyroBurst','AMRS','3','300','3200','0','70','0','1600','688','1','75','0','2520.00','48.90','202.00','19.20','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('2','11-Series Broadsword','KBAR','3','300','2850','12000','80','900','1800','3114','100','0','0','9999.00','1.00','202.00','10.70','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','Omnisky IX Laser Cannon','AMRS','3','300','2900','0','80','0','2000','4200','0','175','0','2520.00','25.40','201.00','10.00','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','M5A Laser Cannon','BEHR','3','300','3100','0','120','0','2009','4259','0','135','0','2520.00','18.00','202.00','7.10','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('2','Tarantula GT-870 Mark 3','GATS','3','300','3150','0','85','360','1800','3780','200','0','0','9999.00','1.00','202.00','9.70','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','CF-227 Panther Repeater','KLWE','3','300','3150','0','275','0','1850','2424','0','95','0','2520.00','13.10','202.00','5.20','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('2','Mantis GT-220','GATS','3','300','3300','16000','1050','1600','1500','1425','32','0','0','9999.00','1.00','202.00','1.30','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('2','KRIG Tigerstreik T-21','KRIG','3','300','3000','0','1075','1600','1500','1425','32','0','0','9999.00','1.00','202.00','1.20','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','Omnisky XII Laser Cannon','AMRS','4','400','3900','0','75','0','2025','5063','0','350','0','2880.00','29.30','231.00','11.50','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','M6A Laser Cannon','BEHR','4','400','4100','0','110','0','2039','5138','0','270','0','2880.00','19.90','231.00','7.80','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('2','Apocalypse Arms Revenant Ballistic Gatling','APAR','4','400','4000','16000','1300','1600','1600','1568','44','0','0','9999.00','1.00','249.00','1.30','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('2','BEHR C-788 Ballistic Cannon','BEHR','4','400','4100','0','70','240','1900','4275','451','0','450','9999.00','1.00','231.00','13.20','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','WAR Neutron Cannon','Vanduul Raider','5','500','5250','0','75','0','1750','5828','0','500','0','3240.00','38.20','244.00','15.00','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','BEHR M7A Laser Cannon','BEHR','5','500','5100','0','100','0','2075','7263','0','380','0','3240.00','29.00','259.00','11.40','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('1','WRATH Plasma Cannon','Vanduul Raider','5','500','5500','0','85','0','1700','5508','0','495','0','3240.00','35.10','260.00','13.80','desc');
INSERT INTO `Guns` (`type`, `name`, `maker`, `size`, `mass`, `hp`, `voyprice`, `rof`, `ammocount`, `pspeed`, `maxrange`, `pdamage`, `edamage`, `ddamage`, `powercap`, `powerpershot`, `heatcap`, `heatpershot`, `desc`) VALUES ('2','RSI Ballistic Repeater S9','RSI','9','150','150','0','100','1000','1800','9000','10000','0','0','0.00','1.00','600.00','13.00','desc');



CREATE TABLE `Pages` (
	`pageid` int(4) NOT NULL AUTO_INCREMENT,
	`url` varchar(40) NOT NULL,
	`title` varchar(40) NOT NULL,
	`description` varchar(256) NOT NULL,
	PRIMARY KEY (`pageid`),
	UNIQUE KEY `pageid_UNIQUE` (`pageid`)
	)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `Pages` (`url`, `title`, `description`) VALUES ('index', 'Home', 'A little website written about all my favourite things');
INSERT INTO `Pages` (`url`, `title`, `description`) VALUES ('aboutme', 'About Me', 'Random stuff about me');
INSERT INTO `Pages` (`url`, `title`, `description`) VALUES ('games', 'Games', 'Computer Games that I love');
INSERT INTO `Pages` (`url`, `title`, `description`) VALUES ('books', 'Books', 'Books that I love');
INSERT INTO `Pages` (`url`, `title`, `description`) VALUES ('tv', 'TV and Films', 'TV and Films I love');
INSERT INTO `Pages` (`url`, `title`, `description`) VALUES ('roleplay', 'Roleplay', 'What is roleplay');
INSERT INTO `Pages` (`url`, `title`, `description`) VALUES ('guncomparison', 'Star Citizen Gun Comparison', 'A page that allows you to compare the ship weapons from Star Citizen');
INSERT INTO `Pages` (`url`, `title`, `description`) VALUES ('contact', 'Contact Me', 'If you need to get in touch with me, this is the place to do it!');







  
   