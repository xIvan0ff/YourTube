<?php
/* Smarty version 3.1.33, created on 2019-10-24 22:40:40
  from '/var/www/html/yourtube/templates/install/5.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db1fe38a4b8d3_16478426',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5345b4a382434b011ce7732581ca6ce816927964' => 
    array (
      0 => '/var/www/html/yourtube/templates/install/5.php',
      1 => 1571946039,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db1fe38a4b8d3_16478426 (Smarty_Internal_Template $_smarty_tpl) {
?>                        <div class="card-body">
                            <h5 class="card-title">Running Migrations</h5>
                            <p class="card-text"><?php ob_start();
echo $_smarty_tpl->tpl_vars['config']->value['name'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
 will need it's database populated. Please run all migrations.</p>
                            <form class="form" id="database-form" method='post' action="?step=6">
                                <pre><p id="result" class="text-success"></p></pre>
                                <button type="submit" href="" id="fifth-step" class="btn btn-back">Run <i class="fas fa-database"></i> & Continue <i class="fas fa-arrow-circle-right"></i></button>
                            </form>
                            <div>
                        </div>
                        <?php echo '<script'; ?>
>
                            var url = maindir + "/functions/run_migrations.php";
                            $("#database-form").submit(function(e) {

                                e.preventDefault();

                                var form = $(this);
                                var nextUrl = form.attr('action');

                                $.ajax({
                                    type: "POST",
                                    url: url,
                                    data: "post:1",
                                    // data: form.serialize(),
                                    success: function(data)
                                    {
                                        $('#result').html(data);
                                    }
                                });

                                setTimeout(() => {
                                    window.location.href = nextUrl;
                                }, 2500);
                            });
                        <?php echo '</script'; ?>
><?php }
}
