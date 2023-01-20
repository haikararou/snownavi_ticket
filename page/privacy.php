<?php
/*
Template Name: プライバシーポリシー
 */
get_header(); ?>

<div class="c-main__wrapper">
	<section class="c-section c-page">
	<?php if(get_field('lead_access')): ?>
		<h1>PROVACY POLICY<span>プライバシーポリシー</span></h1>
		<h2>法令の遵守</h2>
		<p>個人情報保護法及びその他ガイドラインを遵守します。</p>
		<h2>利用目的</h2>
		<p>お客様から直接書面に掲載された個人情報を取得する場合はその都度お客様に利用目的を明示させていただきます。<br>それ以外で個人情報を取得する場合は、次の利用目的制限の範囲内で取り扱わせていただきます。</p>
		<ol>
			<li>お客様に適した情報を郵送・メール等でお届けする。</li>
			<li>イベント等の登録処理。</li>
			<li>お問合せの対応</li>
		</ol>
		<h2>第三者への提供</h2>
		<p>取得した個人情報は、お客様への事前の同意なく第三者に対して開示することはありません。ただし次の場合は除きます。</p>
		<ol>
			<li>法令に基づく場合。</li>
			<li>人の生命、身体及び財産の保護のために緊急の必要性がある場合。</li>
			<li>協力会社として提携して業務を行う場合（協力会社に対しても適切な管理を要求します）。</li>
		</ol>
		<h2>情報管理</h2>
		<p>個人情報の改竄・漏洩を防ぐため、個人情報保護に関して適用される法令、規範を遵守し、適切な安全管理を行います。</p>
		<h2>継続した改善</h2>
		<p>プライバシーポリシーをより良いものにするために適宜見直しを行います。その結果、上記項目を改訂する場合があります。</p>
		<h2>個人情報の取り扱いに関する窓口</h2>
		<p>弊社の個人情報の取り扱いに関するお問合せについては、下記までお申し出ください。<br>株式会社スノーナビ　399-9301 長野県北安曇郡白馬村北城6330-3<br>TEL.<a href="mailto:tel:0261711302">0261-71-1302</a>　FAX.0261-71-1312（8:00-17:00、土日休）<br>Eメールによるお問い合わせ先：<a href="mailto:info@snownavi.com">info@snownavi.com</a></p>
	<?php else:?>
		<h1>PROVACY POLICY</h1>
		<p>Snownavi Co., Ltd. handles the personal information of our guests properly and carefully for the protection of the personal information, complying with the Personal Information Protection Law. In order to execute the duty mentioned above, Snownavi Co., Ltd. provides Privacy Policy as follows and promotes effort to protect the personal information.</p>
		<h2>Compliance with laws and regulations</h2>
		<p>We will comply with the Personal Information Protection Law and any other guidelines.</p>
		<h2>Purpose of usage of the personal information</h2>
		<p>In the events we collects any personal information from our guests in writing directly, we will clearly specify the purpose of use.<br>
		When collecting the personal information in the other way, we will use the personal information within the regulated purpose of use as follows.</p>
		<ol>
			<li>Delivery of the information appropriate for our guests by direct mail or E-mail.</li>
			<li>Registration processing in events.</li>
			<li>Response to inquiry from our guest.</li>
		</ol>
		<h2>Provision to any third party</h2>
		<p>We will not provide any personal information of our guests to any third party without the consent of the guests, except for the case as follows.</p>
		<ol>
			<li>Required by law.</li>
			<li>Required immediately for the protection of human lives, health and property.</li>
			<li>Required by the joint business with the partner company.</li>
		</ol>
		<h2>Safety Management of the personal information</h2>
		<p>In order to prevent the falsification and leakage of the personal information, we will comply with any law, regulations and guidelines regarding the personal information and properly manage the personal information.</p>
		<h2>Continuing improvement</h2>
		<p>We will conduct appropriate review for the improvement of Privacy Policy. Consequently, the clauses above will be revised.</p>
		<h2>Personal Information Inquiry Desk</h2>
		<p>Regarding inquiry about our management of the personal information, please ask to the following.<br>
		Snownavi Co., Ltd. 6330-3, Hokujo, Hakuba-mura, Kitaazumi-gun, Nagano, 399-9301, Japan<br>
		TEL. 0261-71-1302 FAX. 0261-71-1312 (8:00 a.m. ~ 5:00 p.m. weekday)<br>
		Inquiry by E-mail: <a href="mailto:info@snownavi.com">info@snownavi.com</a></p>
	<?php endif;?>
	</section>
</div>

<?php get_footer(); ?>