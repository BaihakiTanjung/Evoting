<style type="text/css">
    label {
        color:white;
    }
</style>

<div class="page-header">
    <h1>Login Admin</h1>
</div>
<div class="login">
<div class="row">
    <div class="col-md-6">        
        <?php if($_POST) include 'aksi.php'; ?>
        <form class="form-signin" action="?m=login" method="post">                        
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Username" name="user" autofocus />
            </div>
            <div class="form-group">            
                <label>Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" />  
            </div>      
            <div class="form-group">                
                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-log-in"></span> Masuk</button>
            </div>        
        </form>      
    </div>
</div>
</div>