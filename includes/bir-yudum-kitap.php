<?php
class BirYudumKitap{
    public function __construct(){

    }
    public function init(){
        add_action("admin_menu",array($this,"adminInit"),10);
        add_shortcode('biryudumkitap', array($this,'shortCodeGoster')); 
    }
    public function shortCodeGoster(){
        ?>
          <p>
              <span><q style="font-style:italic"><?php echo $this->kitapSozuGetir()["quote"];?></q></span>
              <strong><?php echo $this->kitapSozuGetir()["source"];?></strong>
          </p>
        <?php
    }
    public function adminInit(){
        add_menu_page('Bir Yudum Kitap Ayarları', 
        'Bir Yudum Kitap',
         'administrator',
         'biryudumkitap', 
         array($this,"ayarSayfasi"),
         null
        );

        
    }
    public function ayarSayfasi(){
        ?>
         <h2>
         		<?php _e('Bir Yudum Kitap','biryudumkitap')?>
         </h2>  
		 <p><?php _e('Bir Yudum Kitap projesi kapsamında her gün yeni bir kitap sözü gösteren eklenmizin detayların ulaşabilirsiniz ','biryudumkitap')?></p>
          <h3>Örnek Söz</h3>
          <p>
              <strong>Kaynak:</strong>
              <span><?php echo $this->kitapSozuGetir()["source"];?></span>
          </p>
          <p>
              <strong>Söz:</strong>
              <span><?php echo $this->kitapSozuGetir()["quote"];?></span>
          </p>
          <p>
              Yandaki kutucuktaki shorcodu kullanarak bu içeriği istediğiniz yerde gösterebilirsiniz.
              <input type="text" readonly value="[biryudumkitap]"/>
          </p>
        <?php
    }

    public function kitapSozuGetir(){
        $soz=wp_cache_get("biryudumkitap_soz");
        
        if(!$soz){
            $soz=json_decode(file_get_contents("http://extensions.biryudumkitap.com/quote"),true);
            wp_cache_set("biryudumkitap_soz",$soz,null,24*60*60);
        }
        
        return $soz;
    }
}