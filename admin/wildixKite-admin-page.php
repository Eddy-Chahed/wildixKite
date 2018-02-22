<?php
$filename = plugin_dir_path( __FILE__ ) . "config.ini";
$post['email'] = filter_input(INPUT_POST, $_POST['email']);
$post['linkedin'] = filter_input(INPUT_POST, $_POST['linkedin']);
$post['salva'] = filter_input(INPUT_POST, $_POST['salva']);
$content = "";
if($post['salva'] == "si"){
    foreach ($post AS $k=>$v){
        $content .= $k . " = \"" . $v . "\"\n";
    }
    if (!$handle = fopen($filename, 'w')) { 
        return false; 
    }
    $success = fwrite($handle, $content);
    fclose($handle);
}
if(is_readable($filename)){
    $config[] = parse_ini_file($filename, FALSE, INI_SCANNER_RAW);
}
?>
<div class="wrap">
    <h2>Welcome To Wildix Kite Plugin</h2>
    <form id="kite" name="kite" action="" method="POST">
        <input type="hidden" name="salva" id="salva" value="si" />
        <div class="row">
            <div class="form-group col-sm-12">
                <label>Email image</label>
                <input type="text" class="form-control" style="width: 50%;" name="email" id="email" value="<?=$config[0]['email']?>" />
            </div>
            <div class="form-group col-sm-12">
                <label>Linkedin image</label>
                <input type="text" class="form-control" style="width: 50%;" name="linkedin" id="linkedin" value="<?=$config[0]['linkedin']?>" />
            </div>
            <div class="form-group col-sm-12">
                <input type="submit" value="conferma" />
            </div>
        </div>
    </form>
</div>