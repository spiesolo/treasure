<aside class="main-sidebar">

    <section class="sidebar">
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
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => '主菜单', 'options' => ['class' => 'header']],
                    ['label' => '区域管理', 'icon' => 'fa fa-dashboard', 'url' => ['/sd-area']],
                    ['label' => '门禁设备管理', 'icon' => 'fa fa-dashboard', 'url' => ['/sd-machine']],
                    ['label' => '人员管理', 'icon' => 'fa fa-dashboard', 'url' => ['/sd-employee']],
                    ['label' => '部门管理', 'icon' => 'fa fa-dashboard', 'url' => ['/sd-department']],
                    ['label' => '签到记录', 'icon' => 'fa fa-dashboard', 'url' => ['/sd-signin']],
                    ['label' => '操作记录', 'options' => ['class' => 'header']],
                    ['label' => '上报', 'icon' => 'fa fa-dashboard', 'url' => ['/sd-runlog']],
                    ['label' => '下发', 'icon' => 'fa fa-dashboard', 'url' => ['/sd-pc2machine']],
                ],
            ]
        ) ?>

    </section>

</aside>
