<?php if ($current_user): ?>
	<div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/" target="_blank">My Site</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php echo Uri::segment(2) == '' ? 'active' : '' ?>">
                        <?php echo Html::anchor('admin', 'Dashboard') ?>
                    </li>

                    <?php
                        foreach(new GlobIterator(APPPATH.'classes/controller/admin/*.php') as $file)
                        {

                            $section_segment = $file->getBasename('.php');
                            if($section_segment == 'auth' || $section_segment == 'base') {
                                continue;
                            }
                            $section_title = Inflector::humanize($section_segment);
                            ?>
                            <li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
                                <?php echo Html::anchor('admin/'.$section_segment, $section_title) ?>
                            </li>
                            <?php
                        }
                    ?>
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $current_user->username ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo Html::anchor('admin/logout', 'Logout') ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        </div>
<?php endif; ?>