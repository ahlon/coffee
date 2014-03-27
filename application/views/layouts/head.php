<meta charset=utf-8>
<?php 
if (!empty($this->data['_head']['title'])) {
    echo '<title>'.$this->data['_head']['title'].'</title>';
}
if (!empty($this->data['_head']['keywords'])) {
    echo '<meta name="keywords" content="'.$this->data['_head']['keywords'].'">';
}
if (!empty($this->data['_head']['description'])) {
    echo '<meta name="description" content="'.$this->data['_head']['description'].'">';
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
{_assets}
<style>
.navbar {
    min-height:30px;
}

</style>