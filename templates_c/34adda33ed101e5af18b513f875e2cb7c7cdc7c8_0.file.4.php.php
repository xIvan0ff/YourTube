<?php
/* Smarty version 3.1.33, created on 2019-10-24 10:31:31
  from '/var/www/html/yourtube/templates/install/4.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db15353787cb1_31510421',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34adda33ed101e5af18b513f875e2cb7c7cdc7c8' => 
    array (
      0 => '/var/www/html/yourtube/templates/install/4.php',
      1 => 1571902290,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db15353787cb1_31510421 (Smarty_Internal_Template $_smarty_tpl) {
?>                        <div class="card-body">
                            <h5 class="card-title">Connect to MySQL</h5>
                            <p class="card-text"><?php ob_start();
echo $_smarty_tpl->tpl_vars['config']->value['name'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
 will need a MySQL server to run. Connect to yours now.</p>
                            <form class="form" id="mysql-form" method='post' action="?step=5">
                                <div class="form-group">
                                    <label for="mysqlhost">MySQL Host</label>
                                    <input type="text" required class="form-control bg-dark border-dark" name="mysqlhost" id="mysqlhost" placeholder="The host your MySQL server is on." value='<?php ob_start();
echo $_smarty_tpl->tpl_vars['config']->value['mysqlhost'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
'>
                                    <!-- <small id="mysqlhostHelp" class="form-text text-muted">The host your MySQL server is on.</small> -->
                                
                                    <label for="mysqlport">MySQL Port</label>
                                    <input type="number" class="form-control bg-dark border-dark" name="mysqlport" id="mysqlport" pattern="[0-9]" placeholder="The port your MySQL server is on. If not specifed will use the default one (3306)." value='<?php ob_start();
echo $_smarty_tpl->tpl_vars['config']->value['mysqlport'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
'>

                                    <label for="mysqluser">MySQL Username</label>
                                    <input type="text" required class="form-control bg-dark border-dark" name="mysqluser" id="mysqluser" placeholder="The MySQL account name." value='<?php ob_start();
echo $_smarty_tpl->tpl_vars['config']->value['mysqluser'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
'>

                                    <label for="mysqlpass">MySQL Password</label>
                                    <input type="password" required class="form-control bg-dark border-dark" name="mysqlpass" id="mysqlpass" placeholder="The MySQL account password." value='<?php ob_start();
echo $_smarty_tpl->tpl_vars['config']->value['mysqlpass'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
'>
                                    
                                    <div class="mt-4"></div>
                                    <label for="mysqlname">MySQL Database Name</label>
                                    <input type="text" required class="form-control bg-dark border-dark" name="mysqlname" id="mysqlname" placeholder="The MySQL database where <?php echo $_smarty_tpl->tpl_vars['config']->value['name'];?>
 will be installed. (It should be already created)" value='<?php ob_start();
echo $_smarty_tpl->tpl_vars['config']->value['mysqlname'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
'>
                                </div>
                                <p id="result"><span class="font-weight-bold">Result:</span> <span id="result-text">Not Tested</span></p>
                                
                                <div>
                                   <button type="button" class="btn btn-back check">Check connection</button>
                                </div>
                                <div class="my-3">
                                    <button type="submit" href="" id="forth-step" class="btn btn-back" disabled hidden>Next <i class="fas fa-arrow-circle-right"></i></button>
                                </div>
                            </form>
                            <div>
                        </div>
                        <?php echo '<script'; ?>
>
                        function success(result)
                        {
                            // alert(result);
                            result = parseInt(result.slice(result.length - 1));
                            let text;
                            let color;
                            let disabled = true;
                            switch(result)
                            {
                                case 0:
                                    text = "Please fill the required text fields. <i class='fas fa-pen'></i>";
                                    color = "warning";
                                    break;
                                case 1:
                                    text = "Connection unsuccessful. <i class='fas fa-times'></i>";
                                    color = "danger";
                                    break;
                                case 2:
                                    text = "Connection successful. <i class='fas fa-check'></i>";
                                    color = "success";
                                    disabled = false;
                                    break;
                                case 3:
                                    var input_name = "mysqlname";
                                    var input = $("#mysql-form :input[name='"+input_name+"']")[0].value; 
                                    text = "Connection successful, but database '"+ input +"' wasn't found. We are creating it for you...<i class='fas fa-minus-circle'></i>";
                                    color = "info";
                                    setTimeout(success, 1500, "2");
                                    break;
                                default:
                                    text = "undefined <i class='fas fa-bug'></i>";
                                    color = "warning";
                                    break;
                            }
                            $("#result-text").html(text);
                            color = "text-" + color;
                            $('#result').removeClass();
                            $('#result').addClass(color);
                            $('#forth-step').attr("disabled", disabled);
                            $('#forth-step').attr("hidden", disabled);
                            
                        }
                        var url = maindir + "/functions/test_mysql.php";
                        
                        $(document).ready(function(){
                            $(".check").click(function(){
                                $.ajax({
                                    type: "POST",
                                    url: url,
                                    success: success,
                                    data: $("#mysql-form").serialize()
                                });
                           });
                            $('#mysql-form :input').change(function(){
                                $('#forth-step').attr("hidden", true);
                                $('#forth-step').attr("disabled", true);
                            });
                        });
                        
                        <?php echo '</script'; ?>
><?php }
}
