<?php

class user_agent{
	var $a=null,$ib=false,$ir=false,$im=false,$l=array(),$c=array(),$_p=array('windows nt 10'=>'Windows 10','windows nt 6.3'=>'Windows 8.1','windows nt 6.2'=>'Windows 8','windows nt 6.1'=>'Windows 7','linux'=>'Linux','ubuntu'=>'Ubuntu','debian'=>'Debian','gnu'=>'GNU/Linux','unix'=>'Unknown Unix OS','windows nt 6.0'=>'Windows Vista','windows nt 5.2'=>'Windows Server 2003/XP x64','windows nt 5.1'=>'Windows XP','windows xp'=>'Windows XP','windows nt 5.0'=>'Windows 2000','windows nt 4.0'=>'Windows NT 4.0','winnt4.0'=>'Windows NT 4.0','winnt 4.0'=>'Windows NT','winnt'=>'Windows NT','windows me'=>'Windows ME','win16'=>'Windows 3.11','windows 98'=>'Windows 98','win98'=>'Windows 98','windows 95'=>'Windows 95','win95'=>'Windows 95','windows'=>'Unknown Windows OS','windows phone'=>'Windows Phone','android'=>'Android','iphone'=>'iOS','ipad'=>'iOS','ipod'=>'iOS','blackberry'=>'BlackBerry','os x'=>'Mac OS X','mac_powerpc'=>'Mac OS 9','ppc mac'=>'Power PC Mac','freebsd'=>'FreeBSD','ppc'=>'Macintosh','sunos'=>'Sun Solaris','beos'=>'BeOS','apachebench'=>'ApacheBench','aix'=>'AIX','irix'=>'Irix','osf'=>'DEC OSF','hp-ux'=>'HP-UX','netbsd'=>'NetBSD','bsdi'=>'BSDi','openbsd'=>'OpenBSD','symbian'=>'Symbian OS'),$_b=array('OPR'=>'Opera','Flock'=>'Flock','Edge'=>'Spartan','Chrome'=>'Chrome','Opera.*?Version'=>'Opera','Opera'=>'Opera','MSIE'=>'Internet Explorer','Internet Explorer'=>'Internet Explorer','Trident.* rv'=>'Internet Explorer','edge'=>'Edge','Firefox'=>'Firefox','Chimera'=>'Chimera','Phoenix'=>'Phoenix','Firebird'=>'Firebird','Shiira'=>'Shiira','Camino'=>'Camino','Netscape'=>'Netscape','OmniWeb'=>'OmniWeb','Safari'=>'Safari','Mozilla'=>'Mozilla','Konqueror'=>'Konqueror','icab'=>'iCab','Lynx'=>'Lynx','Links'=>'Links','hotjava'=>'HotJava','amaya'=>'Amaya','IBrowse'=>'IBrowse','maxthon'=>'Maxthon','Ubuntu'=>'Ubuntu Web Browser','mobile'=>'Handheld Browser'),$_m=array('android'=>'Android','webos'=>'Mobile','mobileexplorer'=>'Mobile Explorer','mobilexplorer'=>'Mobile Explorer','operamini'=>'Opera Mini','opera mini'=>'Opera Mini','opera mobi'=>'Opera Mobile','fennec'=>'Firefox Mobile','mobile'=>'Generic Mobile','palmsource'=>'Palm','palmscape'=>'Palmscape','motorola'=>'Motorola','nokia'=>'Nokia','palm'=>'Palm','iphone'=>'Apple iPhone','ipad'=>'iPad','ipod'=>'Apple iPod Touch', 'sony'=>'Sony Ericsson','ericsson'=>'Sony Ericsson','blackberry'=>'BlackBerry','cocoon'=>'O2 Cocoon','blazer'=>'Treo','lg'=>'LG','amoi'=>'Amoi','xda'=>'XDA','mda'=>'MDA','vario'=>'Vario','htc'=>'HTC','samsung'=>'Samsung','sharp'=>'Sharp','sie-'=>'Siemens','alcatel'=>'Alcatel','benq'=>'BenQ','ipaq'=>'HP iPaq','mot-'=>'Motorola','playstation portable'=>'PlayStation Portable','playstation 3'=>'PlayStation 3','playstation vita'=>'PlayStation Vita','nintendo dsi'=>'Nintendo DSi','nintendo ds'=>'Nintendo DS','nintendo 3ds'=>'Nintendo 3DS','wii'=>'Nintendo Wii','hiptop'=>'Danger Hiptop','nec-'=>'NEC','panasonic'=>'Panasonic','philips'=>'Philips','sagem'=>'Sagem','sanyo'=>'Sanyo','spv'=>'SPV','zte'=>'ZTE','sendo'=>'Sendo','symbian'=>'Symbian','SymbianOS'=>'SymbianOS','elaine'=>'Palm','palm'=>'Palm','series60'=>'Symbian S60','windows ce'=>'Windows CE','obigo'=>'Obigo','netfront'=>'Netfront Browser','openwave'=>'Openwave Browser','open web'=>'Open Web','openweb'=>'OpenWeb','digital paths'=>'Digital Paths','avantgo'=>'AvantGo','xiino'=>'Xiino','novarra'=>'Novarra Transcoder','vodafone'=>'Vodafone','docomo'=>'NTT DoCoMo','o2'=>'O2','wireless'=>'Generic Mobile','j2me'=>'Generic Mobile','midp'=>'Generic Mobile','cldc'=>'Generic Mobile','up.link'=>'Generic Mobile','up.browser'=>'Generic Mobile','smartphone'=>'Generic Mobile','cellphone'=>'Generic Mobile'),$_r=array('googlebot'=>'Googlebot','bingbot'=>'Bing','yahoo'=>'Yahoo','msnbot'=>'MSNBot','baiduspider'=>'Baiduspider','slurp'=>'Inktomi Slurp','ask jeeves'=>'Ask Jeeves','askjeeves'=>'AskJeeves','fastcrawler'=>'FastCrawler','infoseek'=>'InfoSeek Robot 1.0','lycos'=>'Lycos','yandex'=>'YandexBot','mediapartners-google'=>'MediaPartners Google','CRAZYWEBCRAWLER'=>'Crazy Webcrawler','adsbot-google'=>'AdsBot Google','feedfetcher-google'=>'Feedfetcher Google','curious george'=>'Curious George','ia_archiver'=>'Alexa Crawler','MJ12bot'=>'Majestic-12','Uptimebot'=>'Uptimebot'),$p='Unknown Platform',$b='',$v='',$m='',$r='';

	function __construct(){
		if(isset($_SERVER['HTTP_USER_AGENT'])) $this->a = trim($_SERVER['HTTP_USER_AGENT']);
		if(!is_null($this->a)) self::i();
	}

	function i(){
		foreach ($this->_p as $k=>$v) if(preg_match("|".preg_quote($k)."|i",$this->a)) $this->p = $v;
		foreach (array('sr','sb','sm') as $f) if(self::$f() === true) break;
	}

	function sb(){
		foreach ($this->_b as $k=>$v){
			if (preg_match("|".preg_quote($k).".*?([0-9\.]+)|i",$this->a,$m)){
				$this->ib = true;
				$this->v = $m[1];
				$this->b = $v;
				self::sm();
				return true;
			}
		}
		return false;
	}

	function sr(){
		foreach ($this->_r as $k=>$v){
			if (preg_match("|".preg_quote($k)."|i",$this->a)){
				$this->ir = true;
				$this->r = $v;
				return true;
			}
		}
		return false;
	}

	function sm(){
		foreach ($this->_m as $k=>$v){
			if (false !== (strpos(strtolower($this->a),$k))){
				$this->im = true;
				$this->m = $v;
				return true;
			}
		}
		return false;
	}

	function sl(){
		if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && $_SERVER['HTTP_ACCEPT_LANGUAGE'] != ''){
			$l = preg_replace('/(;q=[0-9\.]+)/i', '', strtolower(trim($_SERVER['HTTP_ACCEPT_LANGUAGE'])));
			$this->l = explode(',',$l);
		}
		if(!$this->l) $this->l = array('Undefined');
	}

	function sc(){
		if (isset($_SERVER['HTTP_ACCEPT_CHARSET']) && $_SERVER['HTTP_ACCEPT_CHARSET'] != ''){
			$c = preg_replace('/(;q=.+)/i', '', strtolower(trim($_SERVER['HTTP_ACCEPT_CHARSET'])));
			$this->c = explode(',',$c);
		}
		if(!$this->c) $this->c = array('Undefined');
	}

	function is_browser($k=0){ return (!$k) ? $this->ib : (isset($this->_b[$k]) && $this->b == $this->_b[$k]); }
	function is_robot($k=0){ return (!$k) ? $this->ir : (isset($this->_r[$k]) && $this->r == $this->_r[$k]); }
	function is_mobile($k=0){ return (!$k) ? $this->im : (isset($this->_m[$k]) && $this->m == $this->_m[$k]); }
	function platform(){ return $this->p; }
	function browser(){ return $this->b; }
	function version(){ return $this->v; }
	function robot(){ return $this->r; }
	function mobile(){ return $this->m; }
	function ip(){ return isset($_SERVER["HTTP_CF_CONNECTING_IP"])? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER['REMOTE_ADDR']; }
	function referrer(){ return (!isset($_SERVER['HTTP_REFERER']) or $_SERVER['HTTP_REFERER'] == '')? '' : trim($_SERVER['HTTP_REFERER']); }
	function is_referral(){ return (!isset($_SERVER['HTTP_REFERER']) or $_SERVER['HTTP_REFERER'] == '')? false : true; }
	function accept_lang($l='en'){ return (in_array(strtolower($l),self::_l(),true)); }
	function accept_charset($c='utf-8'){ return (in_array(strtolower($c),self::_c(),true)); }

	function _l(){
		if(!$this->l) self::sl();
		return $this->l;
	}

	function _c(){
		if(!$this->c) $this->sc();
		return $this->c;
	}
}

$_SERVER['REQUEST_URI'] = isset($_SERVER['REQUEST_URI']) ? explode('?',$_SERVER['REQUEST_URI'])[0]:'/';
if ($_SERVER['REQUEST_URI'] != '/' && $v = preg_replace("/[^0-9]/",'',str_replace(array('%20','+',' '), '', $_SERVER['REQUEST_URI'])) and strlen($v) > 9){
	if(55 != substr($v,0,2)) $v = '55'.$v;
	$user_agent = new user_agent();
	$v = 'https://'.($user_agent->is_mobile()?'api':'web').'.whatsapp.com/send?phone='.$v;
	if(headers_sent()) die("<script>window.location='$v';</script><noscript><meta http-equiv=refresh content=0;URL='$v'></noscript>");
	header("Location: ".$v,true,302);
	die;
}

?><!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Gerador de Link para Whatsapp</title><meta content="Agora ficou simples ter um link direto para o seu número WhatsApp e começar e alavancar o seu negócio." name="description"><meta content="WhatsApp Link Generator - Crie links com apenas 1 clique!" property="og:title"><meta content="Agora ficou simples ter um link direto para o seu número WhatsApp e começar e alavancar o seu negócio." property="og:description"><meta content="//i.imgur.com/n6tGpqh.png" property="og:image"><meta content="summary" name="twitter:card"><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet"><link id="favicon" rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAC1klEQVQ4EW2SW0hUURSG/7U9c9PUydGCJi0stJyCLLqRRSgRQdgFygh6iC4WRT3GPEg9FHQP6kGiCI0isitmPVQGlT10o4hASJqotMacGUcdHWfO2XvFOeOFhvbDPuestf5vrf2fDaQtZl74OxG+3afHQooVG0oa/cZgd78x2Gjm0spBowFmdgaTkeuT7RM39ur9eBx5g6/xLkgwZjinYLVnCTy2HCSUft0p7LuJaMjUWgBTHNKj77K1Cb5T36/hQuctxFVilG09HcKG2ikbUDd9OwP44BC25SbEAnQPh5vc9uxNmz/X4Vn4bUpINIL/h4MV7nm4N+c4C4gmLSNji2Dm8gK7e9PRbw2WuNxVghPF+2BXAjB7pa0X0Y/wB+pJENUw8woRMQb8IX0A9b/uAgq4WHYIe4s2YG1eBcD/IQC48rsFISNqAGqPsJGofNL72jTHEhS6JlvWLMotS+s9/mmwxIOeNk0yKkWWyPR0DHWmsoLQHHwBBuPKzwfjiv+8dcQ7ISAmCdPFJOupEgIOBy7jz3AEp2cfgENqgGSQBIQEoHjMF7MJmEnEVSJU4iocmyCoItj26QgW5M7C0wUXsNBZinPFB/F+USNqPFVjvpS4CiUTd1PCSF6LGANbfW+2ks5GCiQZ810luOTzY2bWVLD5Rxn4HAtg2ftaaJqGL4tvxvO0nDvEzBWK1Ut/oB71XffGT6sYNpWBNROXonrScsuXsz9uoD3xHbu96/nkjP0kBK3UAHSY2V49NnatLYog6KTQ3NeG5mhbCkzAYrcPx4prDSK0ENFzASlXJdmQLeFXmJU5DZsLqmAnkzty0U2bM8gae5d3HT+ce0a3k9ZORDusEinl1aiM1QwawzGvIz/PDIb1vkRD8JHtY6xDeB0FKM0sSlZ7KnSPLTeLiO6bYiKKjAK6mPkXEbUqpVoBsBBiJ4OrCJRvFoHQQ6CXRHTeHNuKjWx/ATSbP2Dq9v/8AAAAAElFTkSuQmCC" type="image/png"/><link rel="apple-touch-icon" sizes="194x194" href="//i.imgur.com/NfrKlKI.png" type="image/png"/><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-borderless/borderless.min.css"><style>.swal2-popup{width:100%;height:100%}.swal2-content{text-align:inherit}.swal2-close{right:20px}.swal2-container.swal2-shown{background-color:#01bfa5}code,kbd{display:inline-block;padding:3px 5px 2px 5px;margin:10px 0 2px;background:#00000033;font-weight:600;font-family:Consolas,Monaco,monospace;direction:ltr;unicode-bidi:embed}*,*:before,*:after{box-sizing:border-box;margin:0;padding:0}body{font-family:'Open Sans',sans-serif;background:#01bfa5 url(//i.imgur.com/n0drXRw.png) no-repeat center}a,a:focus{color:#fff;text-decoration:none;outline:0}a:hover{color:#ffffffd4}.form__label,.form__submit{font-size:14px;font-weight:600;letter-spacing:1.1px;color:#fff;text-transform:uppercase}.form__input,.form__submit{-webkit-transition:all 0.2s ease-in-out;transition:all 0.2s ease-in-out}.form__input:hover,.form__submit:hover,.form__input:focus,.form__submit:focus{box-shadow:0 0 100px 0 rgba(0,0,0,.2)}.box-center{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;-webkit-box-pack:flex-start;-ms-flex-pack:flex-start;justify-content:flex-start;-webkit-box-orient:vertical;-webkit-box-direction:normal;min-height:100vh}.tit-obs{font-size:12px;color:#ffffffd4;margin-top:18px;display:block}h2{font-size:18px;color:#fff;font-weight:300}h2 strong{font-weight:700}.box-mensagem{width:100%;max-width:550px;padding:30px}.box-mensagem--error{text-align:center;color:#fff;background-color:#e74c3c;padding:20px!important;position:fixed;left:0;bottom:0;width:100%;max-width:initial;font-size:14px}.box-mensagem h2{margin-bottom:15px}.form{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:100%;max-width:750px}.form--inline{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row;padding:0;flex-wrap:wrap}.form--inline .form__submit{width:45%;padding-right:20px;padding-left:20px;margin-left:5px}.form--inline .form__submit[disabled]{background-color:#91dcad;color:rgba(58,58,58,.46);cursor:not-allowed}.input-hidden{display:none}.form__control{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;width:100%;padding:10px 0}.form__label{margin-left:15px;margin-bottom:5px}.form__input{border:0;padding:20px;border-radius:40px;outline:0;width:100%;color:#737373}.form__submit{background-color:#26d367;border:0;padding:20px 30px;border-radius:40px;cursor:pointer;outline:0;margin-top:10px}.tit-principal{font-size:24px;font-weight:700;text-transform:uppercase;color:#fff;margin-top:35px;margin-bottom:35px;position:relative}.flex-center{display:flex;align-items:center;justify-content:center;flex-direction:column}.flex-default{display:flex;align-items:center}.btn-link{display:block;text-align:center;text-decoration:none;padding:15px;color:#fff;font-size:14px;font-weight:600;letter-spacing:1.1px;text-transform:uppercase;max-width:220px;border-radius:30px;display:block;margin:10px auto 0;transition:all .2s ease-in-out}.btn-link:hover{background-color:#f1f1f1;color:#737373}.col-half{width:50%;height:100%;min-height:100vh;flex:none;padding:80px}.col-half--first{background:url(//i.imgur.com/dJGPcKK.jpg) center no-repeat;position:relative;background-size:cover;align-items:flex-start;justify-content:center;display:flex;flex-direction:column}.col-half--first:before{content:'';width:100%;height:100%;position:absolute;top:0;left:0;background-color:rgba(0,0,0,.8)}.list-number{list-style:none;text-align:left}.list-number__item{font-size:22px;color:#fff;position:relative;counter-increment:items;margin-bottom:20px;display:flex;align-items:center;justify-content:flex-start}.list-number__item:before{content:counter(items);width:50px;height:50px;background-color:#fff;border-radius:50%;color:#333;display:flex;align-items:center;justify-content:center;margin-right:25px;flex:none;font-weight:700}@media screen and (max-width:768px){.form,.box-mensagem{padding:0}.tit-principal{text-align:center}.box-mensagem h2{text-align:center;margin-top:20px}.form--inline{flex-direction:column}.form--inline .form__submit{width:100%;margin-top:10px}.box-center{flex-direction:column}.col-half{width:100%;display:block;padding:30px}}</style></head><body><div id="app" class="box-center"><aside class="col-half col-half--first"><h2 class="tit-principal">Como funciona?</h2><ul class="list-number"><li class="list-number__item">Insira o nº do WhatsApp Ex: 73981833085</li><li class="list-number__item">Escreva uma mensagem (Opcional)</li><li class="list-number__item">Clique em &#8220;GERAR LINK&#8221; ou aperte &#8220;ENTER&#8221;</li></ul><h1 class="tit-principal" style="font-size:18px;text-transform:none"><a href="#" onclick="api()"><i class="fas fa-external-link-alt"></i> Vizualizar documentação da API</a></h1></aside><div class="col-half flex-center"><h2 class="tit-principal">Gerador de link para Whatsapp</h2><div class="box-mensagem box-mensagem--error" v-if="mensagemError" @click="mensagemError=0" title="Clique para esconder"><i class="fas fa-times-circle"></i> {{mensagemError}}</div><form class="form" @submit="event.preventDefault()" v-if="!sucessForm"><div class="form__control"><label for="numero" class="form__label"><i class="fab fa-whatsapp"></i> N° do celular</label><input type="text" placeholder="(73) 9 8183-3085" class="form__input" id="numero" v-model="numero" /><input type="text" class="input-hidden" v-model="robo" /></div><div class="form__control"><label for="mensagem" class="form__label"><i class="far fa-comment"></i> Mensagem</label><input type="text" placeholder="Escreva o texto" class="form__input" id="mensagem" v-model="mensagem"/></div><button type="submit" class="form__submit" @click="gerarLink"><i class="fas fa-link"></i> Gerar Link</button><small class="tit-obs"><i class="fas fa-info-circle"></i> Não guardamos nenhum dado informado.</small></form><div class="box-mensagem" v-if="sucessForm"><h2><i class="far fa-check-circle"></i> <b>Pronto!</b> Copie e compartilhe !</h2><div class="box-input form form--inline"><input type="text" class="form__input form__input--text" onfocus="this.select()" v-model="link" /><input type="text" class="input-hidden" v-model="robo" /><button class="form__submit form__input--copy" @click="copiarLink"><i class="far fa-copy"></i> Copiar Link</button><button class="form__submit form__submit--short" @click="ajaxBitly"><i class="fas fa-paperclip"></i> Encurtar</button></div><a href="#" class="btn-link" @click="gerarNovoLink"><i class="fas fa-sync-alt"></i> Gerar novo link</a></div></div></div><script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js"></script><script src="https://unpkg.com/axios@0.17.0/dist/axios.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script><script>function api(){Swal.fire({html:'<h1><i class="fas fa-info-circle" style="margin-right:10px"></i><b>Como usar a API</b></h1><br><h3>Endpoint:</h3><code><?='http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.rtrim($_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']), '/\\').'/'?></code><br><br><h3>Metódo:</h3><code>GET</code><br><br><h3>Formatos aceitos:</h3><code><?='http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.rtrim($_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']), '/\\').'/'?>+55 (73) 9 8183-3085</code><br><code><?='http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.rtrim($_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']), '/\\').'/'?>(73) 9 8183-3085</code><br><code><?='http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.rtrim($_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']), '/\\').'/'?>+5573981833085</code><br><code><?='http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.rtrim($_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']), '/\\').'/'?>73981833085</code><br><small class="tit-obs" style="font-size:14px"><b>NOTA:</b> Minimo de 10 caracteres. Todos os caracteres diferentes de números serão ignorados. Caso não haja +55 no inicio, a API adicionara.</small><br><h3>Resposta:</h3><span style="margin-right:10px">Status</span><code>302</code>',showCloseButton:true,showCancelButton:false,showConfirmButton:false})}function maskNumber(){function r(e){return 11===e.replace(/\D/g,"").length?"(00) 0 0000-0000":"(00) 0000-00009"}$("#numero").mask(r,{onKeyPress:function(e,n,i,o){i.mask(r.apply({},arguments),o)}})}function is_mobile(){return void 0!==window.orientation||(ua=navigator.userAgent||navigator.vendor||window.opera)&&-1<ua.indexOf("Android")||-1<ua.indexOf("webOS")||-1<ua.indexOf("iPhone")||-1<ua.indexOf("iPad")||-1<ua.indexOf("iPod")||-1<ua.indexOf("BlackBerry")||-1<ua.indexOf("Windows Phone")||window.innerWidth<=800&&window.innerHeight<=600}new Vue({el:"#app",data:{robo:"",sucessForm:!1,numero:"",mensagem:"",link:"",urlWpp:"https://"+(is_mobile()?"api":"web")+".whatsapp.com/send?",bitly:"https://cors-anywhere.herokuapp.com/https://is.gd/create.php?format=simple&url=",mensagemError:""},methods:{gerarLink:function(e){if(e.preventDefault(),""==this.robo&&(13<this.numero.length?(this.link=this.urlWpp+"phone=55"+this.apenasNumeros(this.numero),this.sucessForm=!0,this.mensagemError=""):this.mensagemError="Preencha com um número valido.",this.numero&&this.mensagem)){var n=encodeURIComponent(this.mensagem);this.link=this.urlWpp+"phone=55"+this.apenasNumeros(this.numero)+"&text="+n,this.sucessForm=!0}},apenasNumeros:function(e){var n=e.replace(/[^0-9]/g,"");return parseInt(n)},gerarNovoLink:function(e){this.resetForm(),n=document.querySelector(".form__submit--short"),n.innerHTML='<i class="fas fa-paperclip"></i> Encurtar',n.disabled=!1,this.sucessForm=!1,setTimeout(maskNumber,150)},resetForm:function(e){this.numero="",this.mensagem="",this.link=this.urlWpp,this.mensagemError=""},ajaxBitly:function(e){var i=this;n=e.target,n.innerHTML='<i class="fa fa-spinner fa-spin"></i> Encurtando',this.bitly+=encodeURIComponent(this.link),axios.get(this.bitly).then(function(e){i.link=e.data,n.innerHTML='<i class="fas fa-check"></i> Encurtado',n.disabled=!0}).catch(function(e){console.log(e),i.mensagemError="Não foi possivel criar o link encurtado!",n.innerHTML='<i class="far fa-frown"></i> Falhou',n.disabled=!0})},copyToClipboard:function(e){document.querySelector(e).select(),document.execCommand("copy")},copiarLink:function(e){var n=e.target;if(!this.robo)try{this.copyToClipboard(".form__input--text"),n.innerHTML='<i class="fas fa-check"></i> Copiado!',setTimeout(function(e){n.innerHTML="<i class='far fa-copy'></i> Copiar link"},1e3)}catch(e){console.log(e),n.innerHTML="<i class='far fa-copy'></i> Copiar Link",this.mensagemError="Infelizmente, não conseguimos copiar o texto. É possivel que o seu navegador não tenha suporte. Tente usar Crtl+C."}}}});</script><script>$(function(){maskNumber()});</script><script>function _r(){document.querySelector("#c9").nextElementSibling.remove()}"loading"!==document.readyState?_r():document.addEventListener("DOMContentLoaded",_r)</script><div id="c9" style="display:none"></div></body></html>
