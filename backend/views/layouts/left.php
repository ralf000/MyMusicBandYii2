<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Menu',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Create menu item', 'icon' => 'fa fa-file-code-o', 'url' => ['menu/create'],],
                            ['label' => 'Menu items', 'icon' => 'fa fa-dashboard', 'url' => ['menu/index'],],
                        ]
                    ],
                    [
                        'label' => 'Gallery',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Create gallery', 'icon' => 'fa fa-file-code-o', 'url' => ['gallery/create'],],
                            ['label' => 'Add image', 'icon' => 'fa fa-file-code-o', 'url' => ['gallery-images/create'],],
                            ['label' => 'Galleries', 'icon' => 'fa fa-dashboard', 'url' => ['gallery/index'],],
                            ['label' => 'Images', 'icon' => 'fa fa-dashboard', 'url' => ['gallery-images/index'],],
                        ]
                    ],
                    [
                        'label' => 'Pages',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Create page', 'icon' => 'fa fa-file-code-o', 'url' => ['page/create'],],
                            ['label' => 'Pages', 'icon' => 'fa fa-dashboard', 'url' => ['page/index'],],
                        ]
                    ],
                    [
                        'label' => 'Blog',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Create article', 'icon' => 'fa fa-file-code-o', 'url' => ['blog/create'],],
                            ['label' => 'Articles', 'icon' => 'fa fa-dashboard', 'url' => ['blog/index'],],
                        ]
                    ],

                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Same tools',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'fa fa-circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
