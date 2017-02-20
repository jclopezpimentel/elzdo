/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//<![CDATA[
        var audio;
        var playlist;
        var tracks;
        var current;
        initaudio();
        function initaudio(){
            current=0;
            audio=$('audio');
            playlist=$('#playlist');
            tracks=playlist.find('li a');
            len=tracks.length-1;
            audio[0].volume=1;
            playlist.find('a').click(function(e){e.preventDefault();
                link=$(this);current=link.parent().index();
                runaudio(link,audio[0])});
                audio[0].addEventListener('ended',function(e){current++;
                    if(current>len){
                        current=0;
                        link=playlist.find('a')[0]
                    }else{
                        link=playlist.find('a')[current]
                    }
                    runaudio($(link),audio[0])})
            }
        function runaudio(id){
            searhid(id);
            $(".promos").removeClass('active-promo');
            $("#promos"+id).addClass('active-promo');
            $("#"+id).addClass('active-promo');
            $("#fb-podcast").attr('onclick',"window.open('https://www.facebook.com/sharer/sharer.php?u=http://enloszapatosdelotro.com.mx/podcasts?id="+id+"','popup', 'toolbar=0, status=0, width=650, height=450');");

        }
        //]]>
        
        function searhid(id){
            $("#titu").empty();
            $("#comentarios").empty();
            var urli = "PromoRadio/idpodcast";
            $.ajax({
                url:urli,
                type:'POST',
                dataType: 'json',
                data:{
                    id: id
                },
                success: function (data) {

                    var player = document.getElementById('audio');
                    player.src=data.Podcast1[0];
                    $("#titu").append(data.Podcast1[1]);
                    $("#comentarios").append(data.Podcast1[2]);
                    player.play();
                },
                error: function (data) {
                       console.log(data);
                }
            });
        }