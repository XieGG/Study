## Symfony 学习
######学习版本 Symfony3.4


### 关于项目初始化
由于vendor文件夹不再加入到仓库中，项目clone下来后，需要执行如下命令，安装第三方包

	composer install
若安装被墙或者很慢，更换中国镜像，执行如下命令，修改仓库源地址

	composer config -g repo.packagist composer https://packagist.phpcomposer.com
详情请阅读: [https://pkg.phpcomposer.com](https://pkg.phpcomposer.com/)
### 关于配置文件parameters.yml
	由于项目是多数据库，数据库配置文件需要复制parameters.yml.dist到parameters.yml，然后修改数据库密码即可
	[数据库多库官方文档](https://symfony.com/doc/3.4/doctrine/multiple_entity_managers.html)
### 关于新增bundle(symfony v3.3 做了优化)
生成新的bundle后，需要手动修改composer.json文件

	"autoload": {
        "psr-4": {
            "AppBundle\\": "src/AppBundle",
            "AdminBundle\\": "src/AdminBundle",
            "MobileBundle\\": "src/MobileBundle",
            "ErpBundle\\": "src/ErpBundle",
            "RbacBundle\\": "src/RbacBundle"
        },
        "classmap": [ "app/AppKernel.php", "app/AppCache.php" ]
    },
	
修改psr-4配置项，加入bundle配置如
	
	"RbacBundle\\": "src/RbacBundle"
然后执行如下命令，更新composer自动加载文件
	
	composer dump-autoload
### 关于生成项目后台管理员账号
	
	$ php bin/console admin:user:generate -u admin -p lcp0578
	generate account username:admin, password:lcp0578?(enter yes|no)yes
	generate success
	
	
### 关于entity类型
- 需要写注释
- 字段类型，需要考虑清楚，不能全部写成varchar(255)
### 关于路由名称
示例：admin_user_index，对应路由为/admin/user 或者 /admin/user/index,有时，路由为了权限控制，需要加前缀，例如/admin

- admin为bundle名称
- user为控制器名称
- index方法名称
### 关于控制器方法名称
遵循 `php bin/console doctrine:generate:crud` 命令生成的对应的方法名称
  
- indexAction() 列表页
- newAction() 新增
- showAction() 详情页
- editAction() 编辑
- deleteAction() 删除
其他方法，自己按功能进行定义（禁止使用拼音）  
模板名称和方法名称对应