<?php
defined('_JEXEC') or die;
include_once JPATH_THEMES . '/' . $this->template . '/logic.php';
?>
<!doctype html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <jdoc:include type="metas" />
    <jdoc:include type="styles" />
    <jdoc:include type="scripts" />
</head>

<body class="<?php echo $bodyClasses; ?>">
    <!-- head with menu, main, sidebars, footer -->
    <header class="header">
        <div class="fundo-logo">
            <div class="container<?php echo $containerFluid; ?>">
                <div class="row">
                    <img src="/images/logo.png" alt="logo" class="logo">
                </div>
            </div>

        </div>
        <div class="container<?php echo $containerFluid; ?>">
            <div class="row">
                <jdoc:include type="modules" name="header" style="<?php echo $this->template.'-default';?>" />
            </div>
        </div>
        <div class="container menu <?php echo $containerFluid; ?>">
            <div class="row">
                <jdoc:include type="modules" name="menu" style="<?php echo $this->template.'-default';?>" />
            </div>
        </div>
    </header>
    <div class="divider-global"></div>
    <main class="main">
        <div class="container<?php echo $containerFluid; ?>">
            <?php if ($this->countModules('main-top')): ?>
            <div class="main-top row">
                <jdoc:include type="modules" name="main-top" style="<?php echo $this->template . '-default'; ?>" />
            </div>
            <?php endif; ?>
            <div class="row">
                <?php if ($this->countModules('sidebar-left')) : ?>
                <div class="sidebar-left col-12 col<?php echo $sidebarWidth; ?>">
                    <div class="row">
                        <jdoc:include type="modules" name="sidebar-left"
                            style="<?php echo $this->template.'-default';?>" />
                    </div>
                </div>
                <?php endif; ?>
                <div class="component col-12 col<?php echo $defaultBoostrapDesktop; ?>">
                    <?php if ($this->countModules('content-top')) : ?>
                    <div class="row">
                        <jdoc:include type="modules" name="content-top"
                            style="<?php echo $this->template.'-default';?>" />
                    </div>
                    <?php endif; ?>
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                    <?php if ($this->countModules('content-bottom')) : ?>
                    <div class="row">
                        <jdoc:include type="modules" name="content-bottom"
                            style="<?php echo $this->template.'-default';?>" />
                    </div>
                    <?php endif;?>
                </div>
                <?php if ($this->countModules('sidebar-right')) : ?>
                <div class="sidebar-right col-12 col<?php echo $sidebarWidth; ?>">
                    <div class="row">
                        <jdoc:include type="modules" name="sidebar-right"
                            style="<?php echo $this->template.'-default';?>" />
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php if ($this->countModules('main-bottom')): ?>
            <div class="main-bottom row">
                <jdoc:include type="modules" name="main-bottom" style="<?php echo $this->template . '-default'; ?>" />
            </div>
            <?php endif; ?>
        </div>
    </main>
    <footer class="footer">
        <div class="container">
            <?php if ($this->countModules('footer')): ?>
            <div class="row">
                <jdoc:include type="modules" name="footer" style="<?php echo $this->template.'-default';?>" />
            </div>
            <?php endif;?>
            <div class="row">
            <div class="col-md-3 contato">
                <h4><i class="fa-regular fa-envelope"></i> Email</h4>
                <p><a href="mailto:codesfrutal@gmail.com">codesfrutal@gmail.com</a></p>
            </div>
            <div class="col-md-3 contato">
                <h4><i class="fa-solid fa-phone"></i> Telefone</h4>
                <p><a href="tel:+553434216300">(34) 3421-6300</a></p>
            </div>
            <div class="col-md-3 contato">
                <h4><i class="fa-brands fa-instagram"></i> Instagram</h4>
                <p><a href="https://www.instagram.com/codesf_frutal" target="_blank">@codesf_frutal</a></p>
            </div>
            <div class="col-md-3 contato">
                <h4><i class="fa-brands fa-whatsapp"></i> WhatsApp</h4>
                <p><a href="https://wa.me/5534991831427" target="_blank">(34) 9 9183-1427</a></p>
            </div>
            <div class="divider-global"></div>
            <div class="col-md-12"> 
                <img src="/images/logo.png" alt="Imagem" class="logo-rodape" />
            </div>
            </div>
            
        </div>
    </footer>

</body>

</html>