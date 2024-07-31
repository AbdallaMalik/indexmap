
		// All Social Media Sites
		// -------------------------------------------------

	// All Social Media Sites ~ Nice Names
	// -------------------------------------------------

function GetSocialMediaSites_NiceNames() {
	return {
		'facebook':'FaceBook',
		'twitter':'Twitter',
		'whatsapp':'WhatsApp',
		'telegram.me':'Telegram.me',
		'skype':'Skype',
		'sms':'SMS',
		'email':'EMail',
		
	};
}

		// Social Media Sites With Share Links
		// -------------------------------------------------

function GetSocialMediaSites_WithShareLinks_OrderedByPopularity() {
	return [
		'facebook',
		'twitter',
		'whatsapp',
		'telegram.me',
		'skype',
		'sms',
		'email',
	];
}

function GetSocialMediaSites_WithShareLinks_OrderedByAlphabet() {
	const nice_names = GetSocialMediaSites_NiceNames();
	
	return Object.keys(nice_names);
}

		// Social Media Site Links With Share Links
		// -------------------------------------------------

function GetSocialMediaSiteLinks_WithShareLinks(args) {
	const validargs = [
		'url',
		'title',
		'image',
		'desc',
		'appid',
		'redirecturl',
		'via',
		'hashtags',
		'provider',
		'language',
		'userid',
		'category',
		'phonenumber',
		'emailaddress',
		'cemailaddress',
		'bccemailaddress',
	];
	
	for(var i = 0; i < validargs.length; i++) {
		const validarg = validargs[i];
		if(!args[validarg]) {
			args[validarg] = '';
		}
	}
	
	const url = fixedEncodeURIComponent(args.url);
	const title = fixedEncodeURIComponent(args.title);
	const image = fixedEncodeURIComponent(args.image);
	const desc = fixedEncodeURIComponent(args.desc);
	const app_id = fixedEncodeURIComponent(args.appid);
	const redirect_url = fixedEncodeURIComponent(args.redirecturl);
	const via = fixedEncodeURIComponent(args.via);
	const hash_tags = fixedEncodeURIComponent(args.hashtags);
	const provider = fixedEncodeURIComponent(args.provider);
	const language = fixedEncodeURIComponent(args.language);
	const user_id = fixedEncodeURIComponent(args.userid);
	const category = fixedEncodeURIComponent(args.category);
	const phone_number = fixedEncodeURIComponent(args.phonenumber);
	const email_address = fixedEncodeURIComponent(args.emailaddress);
	const cc_email_address = fixedEncodeURIComponent(args.ccemailaddress);
	const bcc_email_address = fixedEncodeURIComponent(args.bccemailaddress);
	
	var text = title;
	
	if(desc) {
		text += '%20%3A%20';	// This is just this, " : "
		text += desc;
	}
	
	return {
		'facebook':'http://www.facebook.com/sharer.php?u=' + url,
		'twitter':'https://twitter.com/intent/tweet?url=' + url + '&text=' + text + '&via=' + via + '&hashtags=' + hash_tags,
		'whatsapp':'https://api.whatsapp.com/send?text=' + text + '%20' + url,
		'telegram.me':'https://t.me/share/url?url=' + url + '&text=' + text + '&to=' + phone_number,
		'skype':'https://web.skype.com/share?url=' + url + '&text=' + text,
		'email':'mailto:' + email_address + '?subject=' + title + '&body=' + desc + url,
		'sms':'sms:' + phone_number + '?body=' + text,
		
	};
}

function fixedEncodeURIComponent(str) {
	return encodeURIComponent(str).replace(/[!'()*]/g, function(c) {
		return '%' + c.charCodeAt(0).toString(16);
	});
}
