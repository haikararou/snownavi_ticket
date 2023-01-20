<?php
/*
Template Name: 会社案内
 */
get_header(); ?>

<div class="c-main__wrapper">
  <section class="c-section c-page">
  <?php if(get_field('lead_access')): ?>
    <h1>COMPANY<span>会社案内</span></h1>
    <h2>広告掲載について</h2>
    <dl>
      <div><dt>宿泊施設基本掲載料</dt><dd>年間33,000円（税込）<br>※2年目以降/年間27,500円（税込）</dd></div>
      <div><dt>飲食店、<br>レジャー施設基本掲載料</dt><dd>年間13,200円（税込）<br>※特集ページ/年間22,000円（税込）<br>2年目以降/年間16,500円（税込）</dd></div>
    </dl>
    <div class="btn"><a href="../contact"><span class="c-arw">広告掲載申し込み</span></a></div>
    <h2>会社概要</h2>
    <dl>
      <div><dt>本社所在地</dt><dd>株式会社スノーナビ<br>〒399-9301　長野県北安曇郡白馬村北城6330-3</dd></div>
      <div><dt>連絡先</dt><dd>電話：<a href="tel:0261711302">0261-71-1302</a><br>FAX：0261-71-1312<br><a href="https://www.snownavi.com">https://www.snownavi.com</a><br><a href="mailto:info@snownavi.com">info@snownavi.com</a></dd></div>
      <div><dt>設立</dt><dd>平成11年（1999年）12月</dd></div>
      <div><dt>代表者</dt><dd>榎本　揚右</dd></div>
      <div><dt>監査役</dt><dd>矢口　公勝</dd></div>
      <div><dt>取引銀行</dt><dd>八十二銀行白馬支店、大北農協白馬支所、長野銀行白馬支店、松本信用金庫白馬支店</dd></div>
      <div><dt>事業内容</dt><dd><ol>
        <li>インターネット広告</li>
        <li>リフト券、シーズン券の販売</li>
        <li>ウェブサイトの企画・構築・デザイン</li>
        <li>ドメイン取得・ホスティングサービス</li>
        <li>Webサイト周辺サポート</li>
        <li>各種グラフィックデザイン</li>
        <li>各種印刷（名刺、パンフレット等）</li>
      </ol></dd></div>
      <div><dt>取引先</dt><dd>（公益法人）白馬商工会／各スキー場の観光協会（商業法人）白馬観光開発(株)／八方尾根開発(株)／(株)五竜／(株)大糸／栂池観光開発(株)／岩岳観光(株)／奥白馬高原開発(株)／(株)白馬アルプスホテル／白馬東急ホテル（他約250社）</dd></div>
    </dl>
    <h2>採用情報</h2>
    <p>弊社では、一緒に働いていただける元気で明るいスタッフを募集しています！ 業務提携も歓迎です。<br>
    正社員　 ： 営業マン若干名、webディレクター若干名、webデザイナー若干名<br>
    業務提携 ： グラフィックデザイナー（主にWEB,DTPデザイン経験者)<br>
    業務提携 ： カメラマン<br>
    業務提携 ： システムエンジニア（Perl,PHP,JavaScriptなどWEB向け）<br>
    業務委託 ： レポーター（ゲレンデ内での撮影）</p>
    <h2>各種お問い合わせ・広告のお申込み</h2>
    <div class="btn"><a href="<?php echo home_url('/en/company_en'); ?>"><span class="c-arw">お問い合わせフォーム</span></a></div>
  <?php else:?>
    <h1>COMPANY</h1>
    <h2>About advertisement</h2>
    <dl>
      <div><dt>Standard Advertisement Rate of Accommodation Facilities</dt><dd>JPY33,000 (a year, tax included)<br>*From the second year JPY27,500 (a year, tax included)</dd></div>
      <div><dt>Standard Advertisement Rate of Restaurants and Leisure Facilities</dt><dd>JPY13,200 (a year, tax included)<br>*Feature Page JPY22,000 (a year, tax included)<br>From the second year JPY16,500 (a year, tax included)</dd></div>
    </dl>
    <div class="btn"><a href="<?php echo home_url('/en/company_en'); ?>"><span class="c-arw">Advertisement Application Form</span></a></div>
    <h2>Company Profile</h2>
    <dl>
      <div><dt>Head Office</dt><dd>Snownavi Co., Ltd<br>6330-3, Hokujo, Hakuba-mura, Kitaazumi-gun, Nagano, 399-9301, Japan</dd></div>
      <div><dt>Contact</dt><dd>TEL:0261-71-1302<br>FAX:0261-71-1312<br><a href="https://www.snownavi.com">https://www.snownavi.com</a><br><a href="mailto:info@snownavi.com">info@snownavi.com</a></dd></div>
      <div><dt>Established</dt><dd>December, 1999</dd></div>
      <div><dt>Representative</dt><dd>Yosuke Enomoto</dd></div>
      <div><dt>Auditor</dt><dd>Tadakatsu Yaguchi</dd></div>
      <div><dt>Major Banks</dt><dd>Hachijuni Bank Hakuba Branch, JA Daihoku Hakuba Branch, Nagano Bank Hakuba Branch, Matsumoto Shinkin Bank Hakuba Branch</dd></div>
      <div><dt>Main Business Activities</dt><dd><ol>
        <li>Internet Advertisement</li>
        <li>Lift tickets and season pass sales</li>
        <li>Planning, Construction and Design of the Website</li>
        <li>Domain Acquisition and Hosting Service</li>
        <li>Peripheral Support in the Website</li>
        <li>Various Graphic Design</li>
        <li>Various Printing (business cards, pamphlets and other printing service)</li>
      </ol></dd></div>
      <div><dt>Major Clients</dt><dd>(Public Interest Corporations) Hakuba Society of Commerce and Industry / Tourist Associations of each ski area
(Private Corporations) HAKUBA RESORT DEVELOPMENT Co., Ltd. / Happo-one Development Co., Ltd. / Goryu Co., Ltd / Oito Co., Ltd. / Tsugaike Kanko Development Co., Ltd. / Iwatake Kanko Co., Ltd. / Oku Hakuba-kogen Development Co., Ltd. / Hakuba Alps Hotel Co., Ltd. / HAKUBA TOKYU HOTEL (and other about 250 companies)</dd></div>
    </dl>
    <h2>Recruitment</h2>
    <p>We are recruiting cheerful colleagues to work together with us. Business alliance is also welcome.<br>
    Regular Employee: Sales Staff, the Web Director, the Web Designer<br>
    Business Alliance: Graphic Designer (experience of the WEB, DTP design is necessary)<br>
    Business Alliance: Photographer<br>
    Business Alliance: System Engineer (for Perl, PHP, JavaScript and other Web systems)<br>
    Outsourcing: Reporter (outdoor photography in ski areas)<br></p>
    <h2>Inquiry and application to advertisement</h2>
    <div class="btn"><a href="<?php echo home_url('/en/company_en'); ?>"><span class="c-arw">Inquiry Form</span></a></div>
  <?php endif;?>
  </section>
</div>

<?php get_footer(); ?>

