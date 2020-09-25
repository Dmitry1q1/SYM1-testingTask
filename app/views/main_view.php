<?
session_start();
$map=Array("fio"=>"FIO","email" => "Email", "address" => "Address", "phone_number" => "Phone");
if (isset($_SESSION['authorized']) && $_SESSION['authorized'] == 1){?>
    <br/>admin 
<?}?>
<div class="application-page">
    <div class="table-header">
        <h1>Application form</h1>
    </div>
    

    <div class="application-form">
        <div class="flex-block">
            <div class="row application-filter" id="filter-block">
                <form id="filter-form" action="/main/get/" method="GET">
                    <p><select size="3" name="applications-column">
                        
                        <option disabled>Select filter</option>
                        <?foreach($map as $key => $value):?>
                            <?if(!empty($data["applications-column"]) && $data["applications-column"] === $key):?>
                                <option selected value="<?=$key;?>"><?=$value;?></option>
                            <?else:?>
                                <option value="<?=$key;?>"><?=$value;?></option>
                            <?endif;?>
                        <?endforeach;?>

                    </select></p>
                    <?if(!empty($data["filter"])):?>
                        <input type="text" id="filter" name="filter" value="<?=$data["filter"];?>" required>
                    <?else:?>
                        <input type="text" id="filter" name="filter" value="" required>
                    <?endif;?>
                    <div>
                        <button id="form-submit-btn" name="delete-filter">Delete filter</button>
                        <button id="form-submit-btn" name="add-filter">Use filter</button>
                    </div>
                </form>
            </div>
        </div>
        <?php foreach($data["CONTENT"] as $row):?>
            <div class="row applications" id="<?=$row['application_id'];?>">
                <div class="col-xl-1">
                    <?=$row['application_id'];?>
                </div>
                <div class="col-xl-3">
                    <?=$row['fio'];?>
                </div>
                <div class="col-xl-3">
                    <?=$row['address'];?>
                </div>
                <div class="col-xl-3">
                    <?=$row['email'];?>
                </div>
                <div class="col-xl-2">
                    <?=$row['phone_number'];?>
                </div>
            </div>
        <?endforeach;?>
    </div>

    <?if(!empty($data["SUCCESS"])){?><div class="success"><span><?=$data["SUCCESS"]?></span></div><?}?>
    <?if(!empty($data["error_email"])){?><div class="error"><span><?=$data["error_email"]?></span></div><?}?>

    <div class="row">
        <div class="col-xl-5 add-application">
            <form id="add-form" action="/main/add/" method="POST">

                <div class="row justify-content-center form-header">
                    Add application
                </div>

                <div class="row justify-content-between form-row" form-header">
                    <div class="col-xl-3">
                        <label for="name">FIO</label>
                    </div>
                    <div class="col-xl-9">
                        <input type="text" id="name" name="name" value="" required>
                    </div>
                </div>

                <div class="row justify-content-between form-row" form-header">
                    <div class="col-xl-3">
                        <label for="address">Address</label>
                    </div>
                    <div class="col-xl-9">
                        <input type="address" id="address" name="address" value="" required>
                    </div>
                </div>

                <div class="row justify-content-between form-row" form-header">
                    <div class="col-xl-3">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-xl-9">
                        <input type="text" id="email" name="email" value="" required>
                    </div>
                </div>

                <div class="row justify-content-between form-row" form-header">
                    <div class="col-xl-3"> 
                        <label for="phone">Phone number</label>
                    </div>
                    <div class="col-xl-9">
                        <input type="phone" id="phone" name="phone" value="" required>
                    </div>
                </div>

                <input type="submit" id="form-submit-btn" value="Add application">
            </form>
        </div>




        <?if (isset($_SESSION['authorized']) && $_SESSION['authorized'] == 1):?>
            <div class="col-xl-5 change-application">
                <?if(empty($data["APPLICATION_TO_CHANGE"])):?>
                    <form id="find-form" action="/main/find/" method="GET">
                    
                        <div class="row justify-content-center form-header">
                            Change application
                        </div>

                        <div class="row justify-content-between form-row" form-header">
                            <div class="col-xl-3">
                                <label for="ID">ID</label>
                            </div>
                            <div class="col-xl-9">
                                <input type="text" id="ID" name="ID" value="" required>
                            </div>
                        </div>

                        <button id="form-submit-btn" name="find-application">Find application</button>
                    
                    </form>
                <?endif;?>
                <?if(!empty($data["APPLICATION_TO_CHANGE"])):?>
                    <form id="edit-form" action="/main/edit/" method="POST">
                        <div class="row justify-content-center form-header">
                            Change application
                        </div>
                        <div class="row justify-content-between form-row" form-header">
                            <div class="col-xl-3">
                                <label for="ID" hidden>ID</label>
                            </div>
                            <div class="col-xl-9">
                                <input type="text" id="ID" name="ID" value="<?=$data["APPLICATION_TO_CHANGE"][0]["application_id"];?>" hidden>
                            </div>
                        </div>
                        <div class="row justify-content-between form-row" form-header">
                            <div class="col-xl-3">
                                <label for="name">FIO</label>
                            </div>
                            <div class="col-xl-9">
                                <input type="text" id="name" name="name" value="<?=$data["APPLICATION_TO_CHANGE"][0]["fio"];?>" required>
                            </div>
                        </div>

                        <div class="row justify-content-between form-row" form-header">
                            <div class="col-xl-3">
                                <label for="address">Address</label>
                            </div>
                            <div class="col-xl-9">
                                <input type="address" id="address" name="address" value="<?=$data["APPLICATION_TO_CHANGE"][0]["address"];?>" required>
                            </div>
                        </div>

                        <div class="row justify-content-between form-row" form-header">
                            <div class="col-xl-3">
                                <label for="email">Email</label>
                            </div>
                            <div class="col-xl-9">
                                <input type="text" id="email" name="email" value="<?=$data["APPLICATION_TO_CHANGE"][0]["email"];?>" required>
                            </div>
                        </div>

                        <div class="row justify-content-between form-row" form-header">
                            <div class="col-xl-3"> 
                                <label for="phone">Phone number</label>
                            </div>
                            <div class="col-xl-9">
                                <input type="phone" id="phone" name="phone" value="<?=$data["APPLICATION_TO_CHANGE"][0]["phone_number"];?>" required>
                            </div>
                        </div>

                        <button class="change-application" id="form-submit-btn" name="change-application">Change application</button>
                    </form>
                <?endif;?>
                
            </div>
        <?endif;?>


    </div>

</div>