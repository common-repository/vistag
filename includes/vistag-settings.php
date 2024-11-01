<?php
    $vistag = new Vistag();

    if($_GET["hash"])
    {
        update_option( 'vistag_script', '<script defer src="https://cdn.vistag.com/script.js#'.$_GET["hash"].'"></script>' );
    }

    if (isset($update_message)) echo $update_message;

    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
            $protocol  = "https://";
        } else {
            $protocol  = "http://";
        }

    $url = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<div class="wrap">
    <h2 class='opt-title'><span id='icon-options-general' class='vistag-options'><img src="<?php echo plugins_url('vistag/images/vistag-logo.png');?>" alt=""></span>
        <?php echo __( 'Vistag Settings', 'wp-vistag' ); ?>
    </h2>
    <div style="padding-top:0px;">

        <a style="font-weight:bold;padding:10px 25px;width:100px;background:white;border:0;margin-top: 10px;display:inline-block;text-align: center" href="https://www.vistag.com/externalPlugins/login?from=<?=$url;?>&amp;return_url=<?=$url;?>">Log in</a>

        <?if(get_option( 'vistag_script')!='' AND get_option('installed')==''){
	    update_option( 'installed', True );?>
            <br /><br />
            <div style="color:green;font-weight: bold;">Vistag plugin has been installed.</div>
        <?}?>
	<?if($_GET["hash"]){?>
            <br /><br />
            <div style="color:green;font-weight: bold;">Successfully logged in, you can add tags now.</div>
        <?}?>
    </div>
</div>
