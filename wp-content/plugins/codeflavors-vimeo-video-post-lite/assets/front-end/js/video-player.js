function CFVim_receiveMessage(a){if(-1!=a.origin.indexOf("vimeo")&&"object"!=typeof a.data){var c=jQuery.parseJSON(a.data),d=c.player_id;if(void 0!==d)switch(c.event){case"ready":var e=jQuery(d.replace("CFVimVideoPlayer","#CFVim_videoPlayerContainer_"));jQuery(e).data("ref").updateStatus(1),CFVim_post_action("addEventListener","pause",d),CFVim_post_action("addEventListener","finish",d),CFVim_post_action("addEventListener","play",d);break;case"play":var e=jQuery(d.replace("CFVimVideoPlayer","#CFVim_videoPlayerContainer_"));jQuery(e).data("ref").updateStatus(2);break;case"pause":var e=jQuery(d.replace("CFVimVideoPlayer","#CFVim_videoPlayerContainer_"));jQuery(e).data("ref").updateStatus(3);break;case"finish":var e=jQuery(d.replace("CFVimVideoPlayer","#CFVim_videoPlayerContainer_"));jQuery(e).data("ref").updateStatus(4)}}}function CFVim_post_action(a,b,c){var d={method:a};void 0!==b&&(d.value=b);var e=jQuery("#"+c)[0];e.contentWindow.postMessage(JSON.stringify(d),jQuery(e).attr("src").split("?")[0])}!function(a){a.fn.Vimeo_VideoPlayer=function(b){if(0==this.length)return!1;if(this.length>1)return void this.each(function(){a(this).Vimeo_VideoPlayer(b)});var c={width:500,height:375,play:0,volume:30,fullscreen:1,loop:0,autoplay:0,noWinResize:!1,stateChange:function(){}},d=this,b=a.extend({},c,b),e=!1,f=!1,g=!1,h=!1,i=!1,j=function(){var c=l(),g=n();return a(d).attr("id",g.cid).empty().append('<div id="'+g.pid+'"></div>'),f=g.cid,e=g.pid,h=c,b=m("vimeo"),b.source="vimeo",o(),k(b.aspect_ratio,b.size_ratio),b.noWinResize||a(window).resize(function(){k(b.aspect_ratio,b.size_ratio)}),d},k=function(a,b){cvm_resize_player(d)},l=function(){var b=a(d).data();return b.size_ratio=parseFloat(b.size_ratio),b},m=function(){var d={api:1,title:0,byline:0,portrait:0,color:"",player_id:e,clip_id:b.video_id||h.video_id};return a.extend({},b,d,h)},n=function(){var c=Math.floor(1e3*Math.random()),d={};return d.cid="CFVim_videoPlayerContainer_"+c,d.pid="CFVimVideoPlayer"+c,d},o=function(){p(b.clip_id)},p=function(c){var d={api:1,autoplay:b.autoplay,title:b.title,byline:b.byline,portrait:b.portrait,loop:b.loop,color:b.color,fullscreen:b.fullscreen,player_id:e},g="https://player.vimeo.com/video/"+c+"?"+a.param(d),h='<iframe style="visibility:visible;" id="'+e+'" src="'+g+'" width="100%" height="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';a("#"+f).empty().append(h),q("load"),this.isHTML5||(this.isHTML5=!0)},q=function(a,c){if(this.isHTML5&&"loadVideo"==a)return q("pause"),p(c),void(i=!1);if(!i)return void setTimeout(function(){q(a,c)},100);i=1;var f={play:"api_play",pause:"api_pause",stop:"api_stop",volume:"api_setVolume",loadVideo:"api_loadVideo",unload:"api_unload",volumeDivider:100};if(!g){g=document.getElementById(e);var j=f.volume,k=0==h.volume?0:(h.volume||10)/f.volumeDivider;this.isHTML5?CFVim_post_action(j.replace("api_",""),k,e):g[j](k)}if("volume"==a&&(c/=f.volumeDivider),"load"!=a){var l=f[a];if(this.isHTML5){var m=void 0!==c?c:"";CFVim_post_action(l.replace("api_",""),m,e)}else"loadVideo"==a&&(i=!1),void 0!==c?g[l](c):g[l]();switch(a){case"play":i=2;break;case"pause":i=3;break;case"stop":i=4}b.stateChange.call(d,i)}};return this.play=function(){q("play")},this.pause=function(){q("pause")},this.stop=function(){q("stop")},this.load=function(a){q("loadVideo",a)},this.setVolume=function(a){q("volume",a)},this.getData=function(){return h},this.getStatus=function(){return i},this.updateStatus=function(a){i=a,b.stateChange.call(d,a)},this.resize=function(a,b){k(a,b)},a(this).data("ref",this),j()}}(jQuery),window.addEventListener?window.addEventListener("message",CFVim_receiveMessage,!1):window.attachEvent("onmessage",CFVim_receiveMessage,!1),function(a){a(window).on("load",function(){a('div[class^="cvm_single_video_player"]:not(.cvm_simple_embed)').Vimeo_VideoPlayer({elem_data:!0})}),a(document).ready(function(){a("div.cvm_single_video_player.cvm_simple_embed").each(function(){var b=this;cvm_resize_player(this),a(window).resize(function(){cvm_resize_player(b)})})}),window.cvm_resize_player=function(b){var e,c=a(b).data(),d=a(b).width();if(c.size_ratio=parseFloat(c.size_ratio),c.size_ratio>0)e=Math.floor(d/c.size_ratio);else switch(c.aspect_ratio){case"16x9":default:e=Math.floor(9*d/16);break;case"4x3":e=Math.floor(3*d/4);break;case"2.35x1":e=Math.floor(d/2.35)}a(b).css({height:e})}}(jQuery),function(a){a.fn.CVM_Player_Default=function(b){if(0==this.length)return!1;if(this.length>1)return void this.each(function(){a(this).CVM_Player_Default(b)});var c={player:".cvm-player",items:".cvm-playlist-item a",attr:"rel",loadVideo:function(){}},b=a.extend({},c,b),d=this,e=a(this).find(b.player),f=!1,g=!1,h=a(this).find(b.items),i=!1;currentItem=0;var j=function(){return i=a(e).data(),a.each(h,function(c,g){var j=a(this).data();if(a(this).data("video_data",j),0==c){var m=i;m.video_id=j.video_id,m.volume=j.volume,m.stateChange=k,m.noWinResize=!0,f=a(e).Vimeo_VideoPlayer(m),f.resize(j.aspect_ratio,j.size_ratio),"1"!=j.autoplay||l()||f.play(),currentItem=0,b.loadVideo.call(d,currentItem),a(this).addClass("active-video")}a(this).click(function(e){a(h).removeClass("active-video"),a(this).addClass("active-video"),e.preventDefault(),f.load(j.video_id),f.setVolume(j.volume),f.resize(j.aspect_ratio,j.size_ratio),"1"!=j.autoplay&&1!=i.playlist_loop||l()||f.play(),currentItem=c,b.loadVideo.call(d,currentItem)})}),a(window).resize(function(){var b=a(h[currentItem]).data();f.resize(b.aspect_ratio,b.size_ratio)}),d},k=function(b){if(g=b,4===b&&1==i.playlist_loop&&currentItem<h.length-1){currentItem++;var c=h[currentItem];a(c).trigger("click")}},l=function(){return/webOS|iPhone|iPad|iPod/i.test(navigator.userAgent)};return j()}}(jQuery);