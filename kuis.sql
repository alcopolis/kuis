/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : kuis

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2014-05-14 19:06:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_slug` varchar(255) NOT NULL,
  `article_desc` varchar(255) DEFAULT NULL,
  `article_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article_body` text NOT NULL,
  `like_count` int(11) NOT NULL DEFAULT '0',
  `view_count` int(11) NOT NULL DEFAULT '0',
  `status` enum('approved','pending','rejected') NOT NULL DEFAULT 'pending',
  `article_pic` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('106', '16', 'Justin Bieber Accused in Attempted Robbery', 'Justin_Bieber_Accused_in_Attempted_Robbery', 'It\'s crazy to think that Justin was discovered on the Internet from homemade videos that his mom posted. These days the Canadian singer has millions of fans worldwide and causes a commotion wherever he goes.', '2014-05-14 16:48:43', '<p>Pop star Justin Bieber has been accused in an attempted robbery, Los Angeles police said Tuesday night.</p>\r\n\r\n<p><a href=\"http://www.tmz.com/2014/05/14/justin-bieber-attempted-robbery-lapd-investigation-phone-photos/\">TMZ</a> reports that the incident allegedly took place Monday night&nbsp;Sherman Oaks Castle Park, a complex in the San Fernando Valley with miniature golf and a batting cage.</p>\r\n\r\n<p>The alleged female victim claims Bieber demanded to see her phone so he could erase any photos taken of his entourage, according to the report. The singer allegedly grabbed the woman&#39;s phone when she refused to give it to him.&nbsp;</p>\r\n\r\n<p>The woman claims that after taking the phone, Bieber demanded that she unlock the device to see if she had taken any photos, TMZ reported. She eventually proved no photos were taken.</p>\r\n\r\n<p>She said the singer screamed at her and her 13-year-old daughter, saying, &quot;You&#39;re humiliating yourself in front of your daughter. Why don&#39;t you just get out of here.&quot; Her daughter then started crying, according to the report.&nbsp;</p>\r\n\r\n<p>LAPD Officer Rosario Herrera told <a href=\"http://www.latimes.com/local/lanow/la-me-ln-justin-bieber-alleged-attempted-robbery-20140513-story.html\">The Los Angeles Times</a>&nbsp;that detectives were interviewing the victim of the alleged attempted robbery. Detectives have not interviewed Bieber.</p>\r\n\r\n<p>Pop star Justin Bieber has been accused in an attempted robbery, Los Angeles police said Tuesday night.</p>\r\n\r\n<p><a href=\"http://www.tmz.com/2014/05/14/justin-bieber-attempted-robbery-lapd-investigation-phone-photos/\">TMZ</a> reports that the incident allegedly took place Monday night&nbsp;Sherman Oaks Castle Park, a complex in the San Fernando Valley with miniature golf and a batting cage.</p>\r\n\r\n<p>The alleged female victim claims Bieber demanded to see her phone so he could erase any photos taken of his entourage, according to the report. The singer allegedly grabbed the woman&#39;s phone when she refused to give it to him.&nbsp;</p>\r\n\r\n<p>The woman claims that after taking the phone, Bieber demanded that she unlock the device to see if she had taken any photos, TMZ reported. She eventually proved no photos were taken.</p>\r\n\r\n<p>She said the singer screamed at her and her 13-year-old daughter, saying, &quot;You&#39;re humiliating yourself in front of your daughter. Why don&#39;t you just get out of here.&quot; Her daughter then started crying, according to the report.&nbsp;</p>\r\n\r\n<p>LAPD Officer Rosario Herrera told <a href=\"http://www.latimes.com/local/lanow/la-me-ln-justin-bieber-alleged-attempted-robbery-20140513-story.html\">The Los Angeles Times</a>&nbsp;that detectives were interviewing the victim of the alleged attempted robbery. Detectives have not interviewed Bieber.</p>\r\n\r\n<p>Pop star Justin Bieber has been accused in an attempted robbery, Los Angeles police said Tuesday night.</p>\r\n\r\n<p><a href=\"http://www.tmz.com/2014/05/14/justin-bieber-attempted-robbery-lapd-investigation-phone-photos/\">TMZ</a> reports that the incident allegedly took place Monday night&nbsp;Sherman Oaks Castle Park, a complex in the San Fernando Valley with miniature golf and a batting cage.</p>\r\n\r\n<p>The alleged female victim claims Bieber demanded to see her phone so he could erase any photos taken of his entourage, according to the report. The singer allegedly grabbed the woman&#39;s phone when she refused to give it to him.&nbsp;</p>\r\n\r\n<p>The woman claims that after taking the phone, Bieber demanded that she unlock the device to see if she had taken any photos, TMZ reported. She eventually proved no photos were taken.</p>\r\n\r\n<p>She said the singer screamed at her and her 13-year-old daughter, saying, &quot;You&#39;re humiliating yourself in front of your daughter. Why don&#39;t you just get out of here.&quot; Her daughter then started crying, according to the report.&nbsp;</p>\r\n\r\n<p>LAPD Officer Rosario Herrera told <a href=\"http://www.latimes.com/local/lanow/la-me-ln-justin-bieber-alleged-attempted-robbery-20140513-story.html\">The Los Angeles Times</a>&nbsp;that detectives were interviewing the victim of the alleged attempted robbery. Detectives have not interviewed Bieber.</p>\r\n', '0', '26', 'pending', '8b71979fcd31653ee815a11d0c98dfe7.jpg', '2', null, null, null);
INSERT INTO `article` VALUES ('107', '16', '20000 Homes Evacuated as Wildfires Burn', '20000_Homes_Evacuated_as_Wildfires_Burn', 'More than 20,000 homes in and around San Diego were evacuated, where more than 700 acres have been torched by wildfires. An extended period of drought and high temperatures means number of blazes being reported this year is soaring', '2014-05-14 17:00:01', '<p>Unseasonably warm temperatures and boisterous winds <a href=\"http://bigstory.ap.org/article/california-heat-wave-building\">triggered evacuation orders</a> in San Diego on Tuesday, where more than 700 acres have been torched by wildfires.</p>\r\n\r\n<p>Authorities called for the evacuation of more than 20,000 homes in and around San Diego earlier in the day, but officials allowed many to return to their homes on Tuesday night as temperatures dropped in the area.</p>\r\n\r\n<p>&ldquo;We believe we have a pretty good handle on it,&rdquo; said San Diego Fire Chief Javier Mainar. &ldquo;We hope to do some more work through the night and into tomorrow, but I think the largest part of the emergency has passed.&rdquo;</p>\r\n\r\n<p>An extended period of drought in tandem with unusually high temperatures has left large swaths of the state&rsquo;s landscape ripe for burning.</p>\r\n\r\n<p>&ldquo;Fire season last year never really ended in Southern California,&rdquo; Daniel Berlant, a spokesman for the California Department of Forestry and Fire Protection, told the Associated Press.</p>\r\n\r\n<p>California officials have responded to more than 1,350 fires since the beginning of January, which is double the average number of blazes at this time of year.</p>\r\n\r\n<p>Unseasonably warm temperatures and boisterous winds <a href=\"http://bigstory.ap.org/article/california-heat-wave-building\">triggered evacuation orders</a> in San Diego on Tuesday, where more than 700 acres have been torched by wildfires.</p>\r\n\r\n<p>Authorities called for the evacuation of more than 20,000 homes in and around San Diego earlier in the day, but officials allowed many to return to their homes on Tuesday night as temperatures dropped in the area.</p>\r\n\r\n<p>&ldquo;We believe we have a pretty good handle on it,&rdquo; said San Diego Fire Chief Javier Mainar. &ldquo;We hope to do some more work through the night and into tomorrow, but I think the largest part of the emergency has passed.&rdquo;</p>\r\n\r\n<p>An extended period of drought in tandem with unusually high temperatures has left large swaths of the state&rsquo;s landscape ripe for burning.</p>\r\n\r\n<p>&ldquo;Fire season last year never really ended in Southern California,&rdquo; Daniel Berlant, a spokesman for the California Department of Forestry and Fire Protection, told the Associated Press.</p>\r\n\r\n<p>California officials have responded to more than 1,350 fires since the beginning of January, which is double the average number of blazes at this time of year.</p>\r\n\r\n<p>Unseasonably warm temperatures and boisterous winds <a href=\"http://bigstory.ap.org/article/california-heat-wave-building\">triggered evacuation orders</a> in San Diego on Tuesday, where more than 700 acres have been torched by wildfires.</p>\r\n\r\n<p>Authorities called for the evacuation of more than 20,000 homes in and around San Diego earlier in the day, but officials allowed many to return to their homes on Tuesday night as temperatures dropped in the area.</p>\r\n\r\n<p>&ldquo;We believe we have a pretty good handle on it,&rdquo; said San Diego Fire Chief Javier Mainar. &ldquo;We hope to do some more work through the night and into tomorrow, but I think the largest part of the emergency has passed.&rdquo;</p>\r\n\r\n<p>An extended period of drought in tandem with unusually high temperatures has left large swaths of the state&rsquo;s landscape ripe for burning.</p>\r\n\r\n<p>&ldquo;Fire season last year never really ended in Southern California,&rdquo; Daniel Berlant, a spokesman for the California Department of Forestry and Fire Protection, told the Associated Press.</p>\r\n\r\n<p>California officials have responded to more than 1,350 fires since the beginning of January, which is double the average number of blazes at this time of year.</p>\r\n', '0', '32', 'pending', 'a1e139ba51af321cd26b86630a2813e1.jpg', '2', null, null, null);
INSERT INTO `article` VALUES ('108', '16', 'Ricketts Squeezes Past Bruning', 'Ricketts_Squeezes_Past_Bruning', 'Omaha investor Pete Ricketts and Attorney General Jon Bruning raced neck and neck through the night Tuesday before Ricketts squeezed out an incredibly slender victory at the wire to claim the Republican gubernatorial nomination.', '2014-05-14 17:13:24', '<p>Omaha investor Pete Ricketts and Attorney General Jon Bruning raced neck and neck through the night Tuesday before Ricketts squeezed out an incredibly slender victory at the wire to claim the Republican gubernatorial nomination.</p>\r\n\r\n<p>Bruning conceded the election to Ricketts at about 11:30 p.m., with Ricketts clinging to a lead of fewer than 1,500 votes, or less than one percentage point, in the six-candidate scramble.</p>\r\n\r\n<p>Ricketts subsequently expanded his margin to 2,000 votes as the count reached midnight and pocketed the GOP nomination with 26.5 percent of the total vote.</p>\r\n\r\n<p>State Sen. Beau McCoy of Omaha and State Auditor Mike Foley battled for third place, gathering big chunks of the GOP vote and reducing the percentage required by either Ricketts or Bruning to wrap up the coveted prize.</p>\r\n\r\n<p>Ricketts jumped out to a narrow lead in the early vote count, but Bruning steadily chipped away during the night, moving to within less than 100 votes at one point. But he never could quite catch Ricketts as the counting moved on.</p>\r\n\r\n<p>Trailing behind in what developed into a three-tiered race were former Omaha accounting executive Bryan Slone and state Sen. Tom Carlson of Holdrege.</p>\r\n\r\n<p>The Ricketts-Bruning showdown had been widely anticipated at the end of a long Republican gubernatorial free-for-all that periodically changed its cast of characters and was marked by sharp twists and turns.</p>\r\n\r\n<p>Both Bruning and Ricketts entered the battle with some scars from their last statewide campaigns.</p>\r\n\r\n<p>Ricketts was defeated by Democratic Sen. Ben Nelson in the 2006 Senate race, and Bruning was upended by state Sen. Deb Fischer in the 2012 Republican Senate primary contest. Six months later, Fischer was elected to the Senate.</p>\r\n\r\n<p>The battle between Bruning and Ricketts began as a gentlemanly encounter, but was marred by an onslaught of personal attack ads in the closing weeks.</p>\r\n\r\n<p>Gov. Dave Heineman stepped in late last week with an endorsement for Bruning and campaigned with the attorney general in Hastings, North Platte, Scottsbluff and South Sioux City on Monday.</p>\r\n\r\n<p>Ricketts, former chief operating officer of Ameritrade and a co-owner of the Chicago Cubs, gathered early pluralities in Douglas County (Omaha), Buffalo County (Kearney), Hall County (Grand Island), Lincoln County (North Platte) and Sarpy County (Bellevue).</p>\r\n\r\n<p>Bruning held the lead in a scattering of smaller counties and jumped ahead in Dodge County (Fremont), Platte County (Columbus), Madison County (Norfolk), and Scotts Bluff County.</p>\r\n\r\n<p>Foley led in Lancaster County, his home base.</p>\r\n\r\n<p>But Lincoln and Omaha do not determine the winners of statewide Republican primary elections, which traditionally are dominated by western and central Nebraska.</p>\r\n\r\n<p>Ricketts told voters his business experience would be the ideal fit for a governor who promises to streamline government, control state spending and reduce taxes.</p>\r\n', '0', '20', 'pending', '0d14258fc9f3828f3b91eb779f7b172e.jpg', '3', null, null, null);

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('2', 'Kategori 2');
INSERT INTO `category` VALUES ('3', 'kategori 1');
INSERT INTO `category` VALUES ('5', 'kategori 4');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `is_banned` int(11) DEFAULT '0',
  `banned_reason` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` int(1) DEFAULT '0',
  `role` enum('superadmin','admin','user') DEFAULT 'user',
  `create_by` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('8', 'boy.perkasa@cepat.net.id', '4297f44b13955235245b2497399d7a93', '', '0', null, null, '2014-04-29 17:27:19', '1', 'superadmin', null, 'boy');
INSERT INTO `user` VALUES ('13', 'jimmy.rasu@cepat.net.id', '4297f44b13955235245b2497399d7a93', '', '0', null, null, '2014-04-30 19:04:09', '1', 'superadmin', null, 'Jimmy Rasu');
INSERT INTO `user` VALUES ('14', 'samandajimmy@yahoo.com', '4297f44b13955235245b2497399d7a93', '', '0', '', null, '2014-05-05 10:09:51', '1', 'user', null, 'Jimmy Samanda Rasu');
INSERT INTO `user` VALUES ('15', 'samandajimmyr@gmail.com', '5889136c85ab0b1108170102960899c2', '85f364f8653edf7be4c19187bb454eea', '0', null, null, '2014-05-05 18:17:44', '0', 'user', null, 'Samanda Jimmy');
INSERT INTO `user` VALUES ('16', 'myseconddigitalmail@yahoo.com', '4297f44b13955235245b2497399d7a93', '', '0', null, null, '2014-05-13 17:59:16', '1', 'user', null, 'Adriant Rivano');
