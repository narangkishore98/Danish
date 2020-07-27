
<footer class="grid">
<div class="s-12 text-center margin-bottom">
    <p class="text-size-12">
        <?php require_once 'models/Config.php'; $config = Config::object(); echo $config->getFooterText();?>
    </p>
    <p><a class="text-size-12 text-primary-hover" href="http://www.myresponsee.com"
          title="Responsee - lightweight responsive framework">Design and coding by Responsee Team</a></p>
</div>
</footer>