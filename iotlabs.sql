/*
Navicat MySQL Data Transfer

Source Server         : iotlabs
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : iotlabs

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2018-09-08 17:29:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for iot_article
-- ----------------------------
DROP TABLE IF EXISTS `iot_article`;
CREATE TABLE `iot_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(100) DEFAULT '' COMMENT '//文章标题',
  `art_tags` varchar(100) DEFAULT '' COMMENT '//关键词',
  `art_description` varchar(255) DEFAULT '' COMMENT '//描述',
  `art_thumb` varchar(255) DEFAULT '' COMMENT '//缩略图',
  `art_content` text COMMENT '//内容',
  `art_time` int(11) DEFAULT '0' COMMENT '//发布时间',
  `art_author` varchar(50) DEFAULT '' COMMENT '//作者',
  `art_view` int(11) DEFAULT '0' COMMENT '//查看次数',
  `cate_id` int(11) DEFAULT '0' COMMENT '//分类ID',
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='//文章';

-- ----------------------------
-- Records of iot_article
-- ----------------------------
INSERT INTO `iot_article` VALUES ('1', '亚马逊成美国市值第5大公司 FB不到一天退位', '亚马逊,Facebook', '新浪美股 北京时间30日凌晨讯 Facebook（FB）成为美国市值前五大公司仅不到一天，就被亚马逊公司（AMZN）超越，因后者周四盘后公布了好于预期的业绩报告。', 'uploads/20160809222941394.jpg', '<p><span id=\"usstock_SINA\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class=\"keyword f_st\" href=\"http://stock.finance.sina.com.cn/usstock/quotes/SINA.html\" target=\"_blank\">新浪</a></span><span id=\"quote_SINA\"></span>美股 北京时间30日凌晨讯 <span id=\"usstock_FB\"><a class=\"keyword f_st\" href=\"http://stock.finance.sina.com.cn/usstock/quotes/FB.html\" target=\"_blank\">Facebook</a></span><span id=\"quote_FB\"></span>（FB）成为美国市值前五大公司仅不到一天，就被<span id=\"usstock_AMZN\"><a class=\"keyword f_st\" href=\"http://stock.finance.sina.com.cn/usstock/quotes/AMZN.html\" target=\"_blank\">亚马逊</a></span><span id=\"quote_AMZN\"></span>公司（AMZN）超越，因后者周四盘后公布了好于预期的业绩报告。</p><p>　　亚马逊的股价周五涨11.46美元，涨幅1.5%，市值升至3605亿美元左右。与此同时，Facebook股价下滑27美分，跌幅0.2%，市值降为3569亿美元。</p><p>　　公布最新业绩后，亚马逊的市值排名已前进两位，伯克希尔-哈撒韦（BRKA）的市值排名则进一步倒退至第七名，为3564亿美元。</p><p>　　目前美股排名前四家的公司分别为<span id=\"usstock_AAPL\"><a class=\"keyword f_st\" href=\"http://stock.finance.sina.com.cn/usstock/quotes/AAPL.html\" target=\"_blank\">苹果</a></span><span id=\"quote_AAPL\"></span>公司（AAPL）市值5613亿美元，<span id=\"usstock_GOOG\"><a class=\"keyword f_st\" href=\"http://stock.finance.sina.com.cn/usstock/quotes/GOOG.html\" target=\"_blank\">谷歌</a></span><span id=\"quote_GOOG\"></span>母公司Alphabet （GOOGL）市值5409亿美元，<span id=\"usstock_MSFT\"><a class=\"keyword f_st\" href=\"http://stock.finance.sina.com.cn/usstock/quotes/MSFT.html\" target=\"_blank\">微软</a></span><span id=\"quote_MSFT\"></span>（MSFT）市值4411亿美元；石油巨头<span id=\"usstock_XOM\"><a class=\"keyword f_st\" href=\"http://stock.finance.sina.com.cn/usstock/quotes/XOM.html\" target=\"_blank\">埃克森美孚</a></span><span id=\"quote_XOM\"></span>（XOM）市值3657亿美元。</p><p><br/></p>', '1470752983', '宪校', '12', '1');
INSERT INTO `iot_article` VALUES ('2', '网约车新政窗口期或迎最后一轮补贴战', '约车,新政,平台,补贴 ', '28日，交通运输部正式发布《网络预约出租汽车经营服务管理暂行办法》，酝酿2年的网约车新政终于出炉。新政之所以引人关注，不仅在于其影响了数亿网约车用户的出行、数百万网约车及出租车司机的收入，更影响了动辄几十亿元甚至数百亿元估值的网约车平台。', 'uploads/20160809222911616.jpg', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;28日，交通运输部正式发布《网络预约出租汽车经营服务管理暂行办法》，酝酿2年的网约车新政终于出炉。新政之所以引人关注，不仅在于其影响了数亿网约车用户的出行、数百万网约车及出租车司机的收入，更影响了动辄几十亿元甚至数百亿元估值的网约车平台。新政之后，网约车行业将会出现怎样的变化？这不由引人遐想。</p><p>　　<strong>猜想一</strong></p><p><strong>　　网约车从个体户</strong></p><p><strong>　　走向公司化运营</strong></p><p>　　目前网约车平台已经呈现寡头化格局，但是网约车供给还是一盘散沙。众所周知，经过3年的发展，投入大量资金，网约车平台只剩下滴滴出行、优步、神州专车、易到用车等少数企业。但是，网约车供给方还是以个体户车主为主。</p><p>　　个体户车主看似自由，但是其效率低下、欠缺培训的短板也显而易见。记者在上海调研发现，虽然某平台的上海网约车司机数量是上海出租车司机的10倍，但是其每日订单量只有出租车的三分之二左右，而且这还是补贴后的结果。这也表明，靠着“散兵游勇”，是无法满足源源不断的出行需求的，市场对于“正规军”的需求正逐步显现。</p><p>　　另一方面，大量离开出租车队伍的专业司机，也能成为网约车“正规军”的有效候补。和普通的私家车主相比，这些司机更熟悉路况、驾驶技术更熟练，显然也更有竞争力。</p><p>　　实际上，出租车也经历过从个体户到公司化转变的过程，未来，网约车也很有可能重复这一条路。而且，交通运输部也公开表态，“积极引导鼓励个体经营者组建具有一定规模的公司，增强抵御风险的能力，保障乘客、经营者和驾驶员的合法权益，为行业的健康稳定发展奠定基础”。</p><p>　　<strong>猜想二</strong></p><p><strong>　　网约车平台大量参股</strong></p><p><strong>　　地方网约车公司</strong></p><p>　　轻资产、重技术是网约车平台此前引以为傲的特质，但是未来过分倚重线上将难以为继。</p><p>　　一方面，新政明确规定，网约车平台“应当具备线上线下服务能力”，还特别指出，“在服务所在地有相应服务机构及服务能力”。目前，滴滴出行在400多个城市开展业务，优步也在60多个城市有业务，如果让他们在每个开展业务的地方都外派员工，不仅不划算，而且无法保证质量。相比之下，直接入股当地的网约车公司不失为明智之举。</p><p>　　另一方面，网约车平台在线上实力很强，但对线下的控制力和影响力有限，网约车个体户可以同时在几个平台接单，平台约束力有限。因此，通过入股地方网约车公司，也能充实其“嫡系部队”，打造其服务品牌。</p><p>　　当然，即使从投资回报率上来看，当前出行需求如此旺盛，网约车公司未尝不是优质的投资标的，这也属于正常的产业链布局。</p><p>　　<strong>猜想三</strong></p><p><strong>　　企业通过补贴开启</strong></p><p><strong>　　最后一轮跑马圈地</strong></p><p>　　对于网约车行业信手拈来的补贴大战，新政明确予以否定。新政指出，“网约车平台公司不得有为排挤竞争对手或者独占市场，以低于成本的价格运营扰乱正常市场秩序，损害国家利益或者其他经营者合法权益等不正当价格行为，不得有价格违法行为”。这段规定的指向很明显，就是不鼓励补贴、反对恶意补贴。</p><p>　　考虑到新政是从11月份才开始施行，加上执行边界预计要等地方新政出台才明确，因此，新政也就预留出了一段窗口期。考虑到补贴几乎是网约车平台争夺份额的利器，因此在新政窗口期内，网约车平台企业们是有动力通过补贴开启最后一次跑马圈地的。</p><p><br/></p>', '1470752954', '宪校', '6', '1');
INSERT INTO `iot_article` VALUES ('3', '雷军：小米要做科技界的无印良品', '小米,雷军', '雷军表示，未来5年通路重点将放在实体通路小米之家，计划投入小米营收5%~6%来完成实体通路的建制，日前，期许小米成为科技界的无印良品，发布了国民旗舰手机红米Pro和期待已久的小米笔记本。', 'uploads/20160809222856729.jpg', '<p>　　编者按/小米的模式是什么？小米营销的确难以复制，随着“米家”品牌的推出，小米生态链在定位上再一次得以明晰。小米要做科技界的无印良品。<a class=\"wt_article_link\" href=\"http://weibo.com/leijun?zw=tech\" target=\"_blank\">雷军</a>表示，未来5年通路重点将放在实体通路小米之家，计划投入小米营收5%~6%来完成实体通路的建制，日前，期许小米成为科技界的无印良品，发布了国民旗舰手机红米Pro和期待已久的小米笔记本。另外，小米创办人之一的<a class=\"wt_article_link\" href=\"http://weibo.com/wanqiangli?zw=tech\" target=\"_blank\">黎万强</a>日前也指出，下半年小米将重返高阶市场。小米能否势如破竹？</p><p>　　小米又一次展示了其为发烧而生的目标。7月27日，小米在新品发布会上公布了预热多时的红米Pro和小米笔记本Air两款新品。极具性价比的配置与价格，也印证了小米创始人雷军在发布会上反复强调的“厚道”二字。</p><p>　　雷军介绍，本次新品发售将采用线上与线下同步进行的O2O模式，全力解决米粉们“小米手机买不到，小米手机不好买”的槽点。</p><p>　　与此同时，雷军重申了“做科技界的无印良品”的商业模式，并表示小米笔记本正面无Logo的大胆设计，正是出于对无印良品式企业的自信。业内分析人士认为，对标无印良品，或可以让小米有更多的发展空间。</p><p>　　<strong>新国货欲求“厚道 ”担当</strong></p><p>　　7月27日，小米正式发布了旗下红米品牌的旗舰机型红米Pro，共有三个版本。同时发布的还有小米笔记本Air，分为13.3英寸和12.5英寸两个版本。</p><p>　　随着小米的强势发展，“新国货”也逐渐成为小米主打的广告语。与此同时也受到大众的普遍关注。</p><p>　　据了解，自2013年8月红米手机首次销售以来，红米品牌手机在三年的时间内售出了超过1.1亿台，约平均每秒售出1.2台，雷军称之为是当之无愧的“国民手机”。而这款由吴秀波、刘诗诗、刘昊然三大国民偶像联袂推出的红米Pro在短短数日的预热期中，仅在<span id=\"usstock_WB\"><a class=\"keyword f_st\" href=\"http://stock.finance.sina.com.cn/usstock/quotes/WB.html\" target=\"_blank\">微博</a></span><span id=\"quote_WB\"></span>的话题阅读量就超过2.4亿、三支预热视频总观看量超过2700万。</p><p>　　相比之下，小米笔记本Air的发布更是千呼万唤始出来。据统计，在本次发布之前，关于小米笔记本的<span id=\"usstock_BIDU\"><a class=\"keyword f_st\" href=\"http://stock.finance.sina.com.cn/usstock/quotes/BIDU.html\" target=\"_blank\">百度</a></span><span id=\"quote_BIDU\"></span>搜索量已经达到了592万，并且已经有将近70万篇相关报道文章。</p><p>　　值得注意的是，小米方面对这两款产品赋予了更多的重视。在整个发布会进程中，雷军数次用“厚道”一词来表达对小米新品配置与价格的称赞。</p><p>　　在配置上，红米Pro搭载了先拍照后对焦的双摄像头、联发科年度旗舰Helio X25十核处理器、一体化高光拉丝全金属机身、100%NTSC色域的OLED屏幕等旗舰级配置；小米笔记本Air则搭载了NVIDIA GeForce 940MX独立显卡、256GB的PCIe固态硬盘并可额外扩展，直击目前市面上轻薄笔记本玩游戏太卡，以及大硬盘版太贵两大痛点。</p><p>　　在价格上，红米Pro售价1499元起，根据不同配置分为1499元、1699元、1999元三个档位；小米笔记本Air 售价3499元起，分为3499元、4999元两个档位。</p><p>　　一向以高性价比著称的小米，在这次新品售价上无疑又出了一次风头。雷军在发布会上的比价环节表示，无论是在千元机市场还是笔记本领域，这个定价体现了小米对消费者的诚意。</p><p>　　“这个世界需要小米。”雷军在发布会上自豪坦言。</p><p><br/></p>', '1470752938', '宪校', '0', '2');
INSERT INTO `iot_article` VALUES ('4', '苹果或正在研发自动驾驶', '新闻,早报,微软,手机 ', '苹果最近的战略不仅包含电动汽车，还有自动驾驶软件。最近，苹果雇佣了QNX公司的创始人兼CEO丹·道奇（Dan Dodge），或为将来的苹果汽车开发自动驾驶系统。', 'uploads/20160809222804387.jpg', '<p>苹果最近的战略不仅包含电动汽车，还有自动驾驶软件。最近，苹果雇佣了QNX公司的创始人兼CEO丹·道奇（Dan Dodge），或为将来的苹果汽车开发自动驾驶系统。QNX是一家开发操作系统的公司，该公司在2010年被黑莓收购。</p>', '1470752887', '宪校', '1', '2');
INSERT INTO `iot_article` VALUES ('5', '微软手机部门大裁员', '新闻,早报,微软,手机 ', '微软宣布将在未来12个月内裁员2850人，将裁员计划中的总人数增加至4700人，约占公司员工总数的4%。裁撤的员工中有1850人在手机部门，其中大多数为芬兰员工。', 'uploads/20160809222818779.jpg', '<p>　　微软宣布将在未来12个月内裁员2850人，将裁员计划中的总人数增加至4700人，约占公司员工总数的4%。裁撤的员工中有1850人在手机部门，其中大多数为芬兰员工。微软在2014年收购了<span id=\"usstock_NOK\"><a class=\"keyword f_st\" href=\"http://stock.finance.sina.com.cn/usstock/quotes/NOK.html\" target=\"_blank\">诺基亚</a></span><span id=\"quote_NOK\"></span>的智能手机业务，不过Windows系统的手机并未取得成功，上季度Windows手机销量同比下滑了70%。</p>', '1470752900', '宪校', '2', '3');
INSERT INTO `iot_article` VALUES ('6', '央行力挺网络版银联年底上线', '在线支付,互联网 ', '新浪财经讯 7月31日消息，据财新报道，央行牵头成立线上支付统一清算平台（业内简称网联）的方案已经成型并获央行通过，计划今年年底建成。', 'uploads/20160809222752557.png', '<p>　　新浪财经讯 7月31日消息，据财新报道，央行牵头成立线上支付统一清算平台（业内简称网联）的方案已经成型并获央行通过，计划今年年底建成。</p><p><ins class=\"sinaads sinaads-done\" id=\"SinaAdsArtical\" style=\"overflow: hidden; text-decoration: none; display: block;\" data-ad-pdps=\"PDPS000000056054\" data-ad-status=\"done\"><ins style=\"text-decoration:none;margin:0px auto;width:300px;display:block;position:relative;\"></ins></ins></p><p>　　新浪财经也已经通过其他渠道确认，中行网络金融部副总经理董俊峰将出任网联总裁，并已到央行支付司报道一事。董俊峰曾在新浪财经举办的第三届银行业发展论坛上表示：“互联网金融带来了那么多红利和蓝海，但是我们不能漠视它可能带来的风险，有很多系统性风险的端倪需要大家去注意。”由此也可窥见央行对在线支付市场的态度和立场。</p><p>　　根据新浪财经了解，网联最初的目标是管理预付费卡的支付公司，虽然预付费卡公司素质良莠不齐，卷款潜逃事件频发，但这与互联网支付没有必然联系，知情人士认为网联扩大管理范围显得“莫名其妙”。一位接近网联的人士称，目前来看，网联并非央行业务重点。</p><p>　　但也有专业人士指出，集中化的客户备付金存管体系建设与纯线上支付的网联平台方案定位不同，不存在方案的相互替代关系。</p><p>　　网联的建设，意味着目前大量第三方支付机构直连银行的模式将被切断，回归支付和清算相独立的业务监管规则。财新报道称网联股东不会超过五十家，均为第三方支付公司。据新浪财经了解，此事正由央行支付协会推进，股东范围也已见雏形。</p><p><!-- 正文页左下画中画广告 begin --></p><p>\r\n\r\n			 \r\n\r\n					</p><p><!-- 正文页左下画中画广告 end --><br/></p><p><br/></p>', '1470752875', '宪校', '0', '3');
INSERT INTO `iot_article` VALUES ('7', '一个85后连续创业者的告白', '', '', 'uploads/20160809222735612.png', '<p>　　创业的成功率犹如一条正态分布的钟形曲线，中间高两端低；分布越集中的中间部分代表了大部分创业公司正处于的寻找商业模式阶段，可以用不死不活持续挣扎来形容；两端的分布则一方面代表了一些完全失败的公司（包括现金流断裂，清算，倒闭等等），而另一端的反差则是极为成功的独角兽公司以及巨头形公司 (BAT)。</p><p>　　危机中的危险和机遇</p><p>　　2016年初，随着各位投资界大佬们对资本寒冬论的呼吁，创业者们也感受到了资本的紧缩。经历了过去几年的突飞猛进，目前的二级市场逐渐进入了调整期，IPO变的越来越少，而真正实现IPO的公司也未必能给投资人们带来丰厚的回报。种种二级市场的悲观因素倒逼了一级市场的VC们对于自己所投和未投的项目进行重新审视。然而，对于有实力的创业者来说，资本寒冬所带来的除了危险还有更多的机遇。</p><p>　　在市场疯狂的时候，体现公司成败的往往是融资能力，而未必是公司本身的运行效率，什么样的创业者可以以更高的估值成功融到下一轮成为了最大关注点，这也直接导致融资能力更强的公司可以通过资本上的压倒性优势驱逐运营效率更高的公司；所谓的劣币驱逐良币现象。然而，当危机出现时，市场上的钱会变的更谨慎，资本除了关注用户和收入规模的增长外也更看重了毛利率，净利率，以及能够让所投公司业务产生可持续壁垒的核心指标；简单来说资本关注的更多是公司本身的运营效率。</p><p>　　所以，在真正的危机中往往可以产生出伟大的公司。也因此，创业者在做企业的过程中，一定要强调的是效率的提升，无论是战略层面的还是执行层面的 （我称之为Operational Excellence）。</p><p><br/></p>', '1470752858', '宪校', '10', '1');
INSERT INTO `iot_article` VALUES ('8', '无人机引领农业革命的六大方向', '', '', 'uploads/20160809222706570.png', '<p>　　自从20世纪80年代初起，无人驾驶飞机（UAV）就已经广泛运用于商业活动中。如今在大量投资和宽松政策的双重支持下，无人机更是渗入了各行各业。随着这项技术的飞速发展，各大公司纷纷推出与之相关的新技术、新模式。</p><p>　　根据普华永道国际会计事务所（PwC）的分析，在所有行业中利用无人机解决问题带来的全部效益超过了1270亿美元。其中农业是运用无人机的理想领域之一，它将在无人机的帮助下将迎接巨大挑战。2050年预计全球人口将会达到90亿，此前40年间，农产品消费水平预计增长70%左右。而极端天气状况的加剧进一步阻挠了生产力的发展。</p><p>　　农业从事者必须学着采用创新策略实现耕作任务并提高农作物产量，同时重视可持续发展。要做到以上几点，除了利用无人机以外，与政府、科技以及整个行业的密切合作也不可小觑。</p><p>　　无人机技术将通过实时数据的采集和处理对农业进行高科技改造。我们预计无人机在农业领域带来的价值高达324亿美元。以下是陆空无人机将会涉及的六种耕作方法，猎云网（微信号：ilieyun）带您一起开开眼界</p><p><br/></p>', '1470752836', '宪校', '1', '1');

-- ----------------------------
-- Table structure for iot_category
-- ----------------------------
DROP TABLE IF EXISTS `iot_category`;
CREATE TABLE `iot_category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) DEFAULT '' COMMENT '//分类名称',
  `cate_title` varchar(255) DEFAULT '' COMMENT '//分类说明',
  `cate_keywords` varchar(255) DEFAULT '' COMMENT '//关键词',
  `cate_description` varchar(255) DEFAULT '' COMMENT '//分类描述',
  `cate_order` tinyint(4) DEFAULT '0' COMMENT '//分类排序',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of iot_category
-- ----------------------------
INSERT INTO `iot_category` VALUES ('1', '行业资讯', '收集国内外最新资讯', '行业资讯,资讯', '收集国内外最新资讯收集国内外最新资讯', '0');
INSERT INTO `iot_category` VALUES ('2', '应用实例', '发展国民体育事业', '', '', '1');
INSERT INTO `iot_category` VALUES ('3', '使用教程', '人人都需要娱乐', '', '', '2');

-- ----------------------------
-- Table structure for iot_config
-- ----------------------------
DROP TABLE IF EXISTS `iot_config`;
CREATE TABLE `iot_config` (
  `conf_id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_title` varchar(50) DEFAULT '' COMMENT '//标题',
  `conf_name` varchar(50) DEFAULT '' COMMENT '//变量名',
  `conf_content` text COMMENT '//变量值',
  `conf_order` int(11) DEFAULT '0' COMMENT '//排序',
  `conf_tips` varchar(255) DEFAULT '' COMMENT '//描述',
  `field_type` varchar(50) DEFAULT '' COMMENT '//字段类型',
  `field_value` varchar(255) DEFAULT '' COMMENT '//类型值',
  PRIMARY KEY (`conf_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of iot_config
-- ----------------------------
INSERT INTO `iot_config` VALUES ('1', '网站标题', 'web_title', '物联实验室', '1', '', 'input', '');
INSERT INTO `iot_config` VALUES ('2', '统计代码', 'web_count', '<a href=\"/\">网站统计</a>', '2', '网站统计代码', 'textarea', '');
INSERT INTO `iot_config` VALUES ('3', '网站状态', 'web_status', '0', '3', '网站状态：:1为开启，0为关闭。', 'radio', '1|开启,0|关闭 ');
INSERT INTO `iot_config` VALUES ('6', '辅助标题', 'seo_title', '最专业的物联网平台！', '4', '对网站名称的补充。', 'input', '');
INSERT INTO `iot_config` VALUES ('7', '关键词', 'keywords', '物联,IOT,实验室', '5', '关键词', 'input', '');
INSERT INTO `iot_config` VALUES ('8', '描述', 'description', '物联实验室，中国最专业的物联网平台！', '6', '描述', 'textarea', '');
INSERT INTO `iot_config` VALUES ('9', '版权信息', 'copyright', 'Design by 后盾网 <a href=\"http://www.miitbeian.gov.cn/\" target=\"_blank\">http://www.houdunwang.com</a>', '7', '版权信息', 'textarea', '');

-- ----------------------------
-- Table structure for iot_custom
-- ----------------------------
DROP TABLE IF EXISTS `iot_custom`;
CREATE TABLE `iot_custom` (
  `custom_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `custom_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '//客户名称',
  `custom_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '//客户描述',
  `custom_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '//客户网站',
  `custom_order` int(11) NOT NULL DEFAULT '0' COMMENT '//排序',
  `custom_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '//客户Logo',
  PRIMARY KEY (`custom_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of iot_custom
-- ----------------------------
INSERT INTO `iot_custom` VALUES ('1', '百度', '百度一下', 'http://www.baidu.com', '1', '');
INSERT INTO `iot_custom` VALUES ('2', '谷歌', '谷歌', 'http://www.google.com', '2', '');
INSERT INTO `iot_custom` VALUES ('3', '必应', '必应', 'http://www.bing.com', '3', '');

-- ----------------------------
-- Table structure for iot_device
-- ----------------------------
DROP TABLE IF EXISTS `iot_device`;
CREATE TABLE `iot_device` (
  `dev_id` int(11) NOT NULL AUTO_INCREMENT,
  `dev_name` varchar(100) NOT NULL DEFAULT '' COMMENT '//设备名称',
  `dev_authcode` varchar(100) NOT NULL DEFAULT '' COMMENT '//设备鉴权码',
  `dev_pic` varchar(100) NOT NULL DEFAULT '' COMMENT '//设备图片',
  `dev_addr` varchar(100) NOT NULL DEFAULT '' COMMENT '//设备地址',
  `dev_description` varchar(255) NOT NULL DEFAULT '' COMMENT '//设备描述',
  `type_id` int(11) NOT NULL DEFAULT '0' COMMENT '//设备类型',
  `user_id` int(11) NOT NULL COMMENT '//设备用户',
  `dev_pid` int(11) NOT NULL DEFAULT '0' COMMENT '//中移dev_id',
  `dev_lock` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0' COMMENT '//是否已绑定',
  PRIMARY KEY (`dev_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='//设备';

-- ----------------------------
-- Records of iot_device
-- ----------------------------
INSERT INTO `iot_device` VALUES ('1', '温湿度传感器', '5b83fa1324ef0', '', '', '', '1', '1', '38740273', '1');
INSERT INTO `iot_device` VALUES ('4', '空气质量传感器', '5b83f9f3ab04c', '', '', '', '3', '1', '30923983', '1');
INSERT INTO `iot_device` VALUES ('5', 'ADP-120K', '5b83f900af268', '', '', '', '2', '6', '36428700', '1');
INSERT INTO `iot_device` VALUES ('6', 'ADP-120K', '5b869d33116d7', '', '', '', '2', '1', '39926336', '1');
INSERT INTO `iot_device` VALUES ('7', '', '5b869dc35912c', '', '', '', '2', '0', '39926408', '0');
INSERT INTO `iot_device` VALUES ('8', '', '5b869ff5793ed', '', '', '', '2', '0', '39926745', '0');

-- ----------------------------
-- Table structure for iot_navs
-- ----------------------------
DROP TABLE IF EXISTS `iot_navs`;
CREATE TABLE `iot_navs` (
  `navs_id` int(11) NOT NULL AUTO_INCREMENT,
  `navs_name` varchar(50) DEFAULT '' COMMENT '//名称',
  `navs_alias` varchar(50) DEFAULT '' COMMENT '//别名',
  `navs_url` varchar(255) DEFAULT '' COMMENT '//URL',
  `navs_order` int(11) DEFAULT '0' COMMENT '//排序',
  PRIMARY KEY (`navs_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of iot_navs
-- ----------------------------
INSERT INTO `iot_navs` VALUES ('1', '首页', 'Protal', 'http://www.news.com', '1');
INSERT INTO `iot_navs` VALUES ('2', '关于我', 'About', 'http://www.example.com', '2');
INSERT INTO `iot_navs` VALUES ('3', '慢生活', 'Life', 'http://www.learn.com', '3');
INSERT INTO `iot_navs` VALUES ('5', '碎言碎语', 'Doing', 'http://', '5');
INSERT INTO `iot_navs` VALUES ('6', '模板分享', 'Share', 'http://', '6');
INSERT INTO `iot_navs` VALUES ('7', '学无止境', 'Learn', 'http://', '7');
INSERT INTO `iot_navs` VALUES ('8', '留言版', 'Gustbook', 'http://', '8');

-- ----------------------------
-- Table structure for iot_type
-- ----------------------------
DROP TABLE IF EXISTS `iot_type`;
CREATE TABLE `iot_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) DEFAULT '' COMMENT '//产品名称',
  `type_pid` int(11) DEFAULT NULL COMMENT '//产品ID',
  `type_apikey` varchar(255) DEFAULT '' COMMENT '//APIKEY',
  `type_parsername` varchar(255) DEFAULT '' COMMENT '//解析脚本',
  `type_description` varchar(255) DEFAULT '' COMMENT '//产品描述',
  `type_order` tinyint(4) DEFAULT '0' COMMENT '//产品排序',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of iot_type
-- ----------------------------
INSERT INTO `iot_type` VALUES ('1', 'AHA', '163065', 'Ora1S6rQ1vzTJNgTooBp9FJ2sGc=', 'INV', 'AHA系列产品', '0');
INSERT INTO `iot_type` VALUES ('2', 'ADP', '139303', '8LkwwdzO8bK7OxbJ8guziTQcIYs=', 'ADP', '', '1');
INSERT INTO `iot_type` VALUES ('3', 'AHP', '136524', 'yUzJz=PCPkMzZf5uIB3H3i7IouA=', 'Temp_Humi', '', '2');

-- ----------------------------
-- Table structure for iot_user
-- ----------------------------
DROP TABLE IF EXISTS `iot_user`;
CREATE TABLE `iot_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL DEFAULT '' COMMENT '//用户名',
  `user_pass` varchar(255) NOT NULL DEFAULT '' COMMENT '//密码',
  `user_key` varchar(255) NOT NULL DEFAULT '' COMMENT '//UserKey',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of iot_user
-- ----------------------------
INSERT INTO `iot_user` VALUES ('1', 'admin', 'eyJpdiI6IkdJeGRGcUZCejB0NldiNTJvQjMweXc9PSIsInZhbHVlIjoiREJNZFZ1WVFHN3BpdXNkZ1c0YkpEdz09IiwibWFjIjoiOTFkNzI4OWViOTk3OWI5Yjc4NzlmY2Q3NWFlMDU4YTFiYThkNDYwYmM1OTcyNDQ5ODBkZjk3NDhkOGQ4NGEwZSJ9', '4932063eda5ab43b03aafdcc24f409d9');
INSERT INTO `iot_user` VALUES ('6', 'user', 'eyJpdiI6IlFKMUhFR3dWbVNFRWtsd1o3ZVE2UGc9PSIsInZhbHVlIjoiR09sYjFXaXlJdnVKNzBSSzYyQ25jUT09IiwibWFjIjoiYWUzYTJkOWFmODlkNTdhNzY1NWZmYThiN2U3OGQzNDFmNGM2NjY3MTk1OWFkYjA3Y2FhNzFhOWIxYjk0YzZlMSJ9', 'ca525226e69ea6ab8f517f7e021d04e5');
INSERT INTO `iot_user` VALUES ('7', 'first', 'eyJpdiI6ImNcL3p0MERJQUFxNjhTdDgrcGw3R0tnPT0iLCJ2YWx1ZSI6IkF3UTNwUG11SnNcLzZ6UEx2QXd1NmtnPT0iLCJtYWMiOiI0YjkzNmI3OTNiY2UzNzExNTNmMTBiZjQ5YzcwMmM0ZWIzMGNhNjY1MzM5NzFhN2EzNWFmOGJmZjY2NTY4NGUwIn0=', '3970c718cabeaf453d2d79c4c4923c5f');

-- ----------------------------
-- Table structure for iot_variate
-- ----------------------------
DROP TABLE IF EXISTS `iot_variate`;
CREATE TABLE `iot_variate` (
  `var_id` int(11) NOT NULL AUTO_INCREMENT,
  `var_name` varchar(100) NOT NULL DEFAULT '' COMMENT '//变量名称',
  `var_alias` varchar(100) NOT NULL DEFAULT '' COMMENT '//变量别名',
  `var_type` varchar(255) NOT NULL DEFAULT '' COMMENT '//变量类型',
  `var_unit` varchar(50) NOT NULL DEFAULT '' COMMENT '//变量单位',
  `var_equation` varchar(100) NOT NULL DEFAULT '' COMMENT '//变量公式',
  `var_value` int(11) NOT NULL DEFAULT '0' COMMENT '//变量值',
  `var_order` tinyint(4) NOT NULL DEFAULT '0' COMMENT '//变量排序',
  `dev_id` int(11) NOT NULL DEFAULT '0' COMMENT '//设备ID',
  `var_description` varchar(255) NOT NULL DEFAULT '' COMMENT '//变量描述',
  PRIMARY KEY (`var_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of iot_variate
-- ----------------------------
INSERT INTO `iot_variate` VALUES ('1', '温度', 'T', 'numeric', '℃ ', 'X', '2', '1', '1', '温度传感器的温度');
INSERT INTO `iot_variate` VALUES ('3', '湿度', 'H', 'numeric', '%', 'X', '1', '2', '1', '温湿度传感器的湿度');
INSERT INTO `iot_variate` VALUES ('5', '开关', 'S', 'switch', '', '1|开启,0|关闭', '0', '3', '1', '温湿度控制器开关');
