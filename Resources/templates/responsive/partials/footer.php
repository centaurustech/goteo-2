<footer id="footer" class="footer">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
            <div class="col-sm-8">
              <ul class="list-inline footer-list">
                <li><a href="/about"><?= $this->text('regular-header-about')?></a></li>
                <li><a href="http://stats.goteo.org" target="_blank"><?= $this->text('footer-resources-stats') ?></a></li>
                <li><a href="/user/login"><?= $this->text('regular-login')?></a></li>
                <li><a href="/contact"><?= $this->text('regular-footer-contact')?></a></li>
                <li><a data-jslicense="1" href="/about/librejs">Licenses</a></li>
                <li><a href="/faq"><?= $this->text('regular-header-faq')?></a></li>
              </ul>
            </div>

            <div class="col-sm-4 hidden-xs">
              <ul class="list-inline text-right">
                <li class="label-img"><a href="#"><?=$this->text('footer-platoniq-iniciative') ?></a></li>
                <li><a href="http://fundacion.goteo.org"><img src="/view/css/logoFG.png" class="img-responsive logo" alt="Fundación Goteo"></a></li>
              </ul>
            </div>
        </div>
        <div class="social text-center">
          <a class="fa fa-twitter" title="" target="_blank" href="<?=$this->text('social-account-twitter') ?>"></a>
          <a class="fa fa-facebook" title="" target="_blank" href="<?=$this->text('social-account-facebook') ?>"></a>
          <a class="fa fa-instagram" title="" target="_blank" href="<?=$this->text('social-account-instagram') ?>"></a>
          <a class="fa fa-telegram" title="" target="_blank" href="<?=$this->text('social-account-telegram') ?>"></a>
          <a class="fa fa-github" title="" target="_blank" href="<?=$this->text('social-account-github') ?>"></a>
          <a class="fa fa-newspaper-o" title="" target="_blank" href="/newsletter"></a>
        </div>
      </div>
    </div>
</footer>



