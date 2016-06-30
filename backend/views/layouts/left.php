
<?php

use yii\bootstrap\Nav;
use mdm\admin\components\MenuHelper;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>住艺君</p>

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

        <?php
//        dmstr\widgets\Menu::widget(
//                [
//                    'options' => ['class' => 'sidebar-menu'],
//                    'items' => [
//                        ['label' => '后台管理菜单', 'options' => ['class' => 'header']],
//                        [
//                            'label' => "设计师管理",
//                            'icon' => "fa fa-edit",
//                            'options' => ['class' => 'active'],
//                            'url' => "#",
//                            'items' => [
//                                ['label' => '设计师列表', 'icon' => 'fa fa-circle-o', 'url' => ['designer/index'],],
//                                ['label' => '添加设计师', 'icon' => 'fa fa-circle-o', 'url' => ['designer/add'],],
//                            ],
//                        ],
//                        [
//                            'label' => "项目管理",
//                            'icon' => "fa fa-edit",
//                            'options' => ['class' => 'active'],
//                            'url' => "#",
//                            'items' => [
//                                ['label' => '项目列表', 'icon' => 'fa fa-circle-o', 'url' => ['project/index'],],
//                                //['label' => '项目详情', 'icon' => 'fa fa-circle-o', 'url' => ['project/view'],],
//                            ],
//                        ],
//                        [
//                            'label' => 'Same tools',
//                            'icon' => 'fa fa-share',
//                            'url' => '#',
//                            'items' => [
//                                ['label' => 'Gii', 'icon' => 'fa fa-pie-chart', 'url' => ['/gii'],],
//                                ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
//                            ],
//                        ],
//                    ],
//                ]
//        );
//var_dump(MenuHelper::getAssignedMenu(Yii::$app->user->id));
//        echo dmstr\widgets\Menu::widget([
//            'options' => ['class' => 'sidebar-menu'],
//            'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id),
//        ]);
//        
//        echo dmstr\widgets\Menu::widget( [ 
//    'options' => ['class' => 'sidebar-menu'], 
//    'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback), 
//] ); ?>
        ?>
        <?php 
$callback = function($menu){ 
    $data = json_decode($menu['data'], true); 
    $items = $menu['children']; 
    $return = [ 
        'label' => $menu['name'], 
        'url' => [$menu['route']], 
    ]; 
    //处理我们的配置 
    if ($data) { 
        //visible 
        isset($data['visible']) && $return['visible'] = $data['visible']; 
        //icon 
        isset($data['icon']) && $data['icon'] && $return['icon'] = $data['icon']; 
        //other attribute e.g. class… 
        $return['options'] = $data; 
    } 
    //没配置图标的显示默认图标 
    (!isset($return['icon']) || !$return['icon']) && $return['icon'] = 'fa fa-circle-o'; 
    $items && $return['items'] = $items; 
    return $return; 
}; 
//这里我们对一开始写的菜单menu进行了优化
echo dmstr\widgets\Menu::widget( [ 
    'options' => ['class' => 'sidebar-menu'], 
    'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback), 
] ); ?>


        <ul class="sidebar-menu">            
            <li class="treeview">               
                <a href="#">                    
                    <i class="fa fa-gears"></i> <span>权限控制</span>                    
                    <i class="fa fa-angle-left pull-right"></i>               
                </a>               
                <ul class="treeview-menu">                   
                    <li class="treeview">                        

                    <li class="treeview">                                

                    <li><a href="<?php echo Yii::getAlias("@web"); ?>/admin/route"><i class="fa fa-circle-o"></i> 路由</a></li>                                    
                    <li><a href="<?php echo Yii::getAlias("@web"); ?>/admin/permission"><i class="fa fa-circle-o"></i> 权限</a></li>                                    
                    <li><a href="<?php echo Yii::getAlias("@web"); ?>/admin/role"><i class="fa fa-circle-o"></i> 角色</a></li>                                    
                    <li><a href="<?php echo Yii::getAlias("@web"); ?>/admin/assignment"><i class="fa fa-circle-o"></i> 分配</a></li>                                    
                    <li><a href="<?php echo Yii::getAlias("@web"); ?>/admin/menu"><i class="fa fa-circle-o"></i> 菜单</a></li>                                

            </li>                        
            <a href="/admin">管理员</a>                
            </li>                
        </ul>            
        </li>        
        </ul>


    </section>

</aside>
