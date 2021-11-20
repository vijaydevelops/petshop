<?php 
$posted_json = json_decode(file_get_contents('php://input'), true);

// var_dump($posted_json);

if(isset($posted_json['gotoMain'])){
    
    $gotoMain = '';
    if(is_array($posted_json['gotoMain'])){
        for($i=0; $i < count($posted_json['gotoMain']) - 1; $i++){
            $gotoMain .= $posted_json['gotoMain'][$i].'/';
        }
    } else {
        $gotoMain = $posted_json['gotoMain'];
    }
    
    
    
} else {
    $gotoMain = './';
}
?>


<?php

    include($gotoMain.'db_const.php');

    $table_name = 'animals';
    $animal_type = '';
    $animal_type_name = 'animal type';

    if(isset($posted_json['animal_type'])) {
        $animal_type = $posted_json['animal_type']; 
    }

    $animal_cat = '';
    $animal_cat_name = 'animal';

    if(isset($posted_json['animal_cat'])) {
        $animal_cat = $posted_json['animal_cat']; 
    }

    if($animal_cat == ''){
        $var = mysqli_query($con,"select id, name from animal_cat where deleted = 0 and id='".$animal_cat."'");
        if(mysqli_num_rows($var)>0){
            // $i=0;
            while($arr=mysqli_fetch_assoc($var))
            {
                $animal_cat_name = $arr['name'];
            }
        }
    }


    // var_dump($animal_type);

    

    session_start();
    if(isset($_SESSION['user']))
    {

    }
    else{

    }
?>

<style>
    .clicks-btn {
        padding: 5px; 
        cursor:pointer;
        border-radius:15px;
        border: 3px solid  #b40a70;
        background-color: #8d2663;
        color:#f2f2f2;
        font-size:15px
    }
    .col-a {
        min-width: 60px;
        width: 60px;
    }
    .col-b {
        min-width: 150px;
        width: 150px;
    }
    .col-c, .col-d, .col-e, .col-f  {
        min-width: 80px;
        width: 80px;
    }
    .col-g {
        min-width: 100px;
        width: 100px;
    }

    .col-i {
        min-width: 120px;
        width: 120px;
    }
    .col-j, .col-k {
        min-width: 80px;
        width: 80px;
    }

    input[type].input-el {
        width:100%;
        height:30px;
        border: 2px solid #b40a70; 
        border-radius:5px; 
        background:transparent;
    }
</style>

<div class="topnav" style="padding-bottom: 0px;">
    <img src="customers.png">
    <h4 style="display: inline; color: rgba(255,255,255,0.9); "> Animals </h4>
</div>

<?php 
    $qry =  "select at.id, at.animal_cat_id, at.name, ac.name as ani_cat_name
                    from animal_type as at
                    left join animal_cat  as ac
                    on at.animal_cat_id = ac.id
                    where at.deleted = 0 and at.id='".$animal_type."'";
    // var_dump($qry);

 ?>

<select name="animal_type_selected" onchange="refreshInnerPanel(this, event)" >
    <option value="" >Select a <?php echo strtolower($animal_cat_name); ?> type</option>
    <?php 

    $var = mysqli_query(
                $con,
                $qry
            );
    if(mysqli_num_rows($var)>0){
        while($arr=mysqli_fetch_assoc($var))
        {
            if($animal_type==$arr['id'])
                $animal_type_name = $arr['name'];
            if($animal_cat == '')
                $animal_cat = $arr['animal_cat_id'];
            if($animal_cat_name == '' || $animal_cat_name == 'animal')
                $animal_cat_name = $arr['ani_cat_name'];
        ?>
        <option value="<?php echo $arr['id']; ?>" <?php echo ($animal_type==$arr['id'] ? 'selected' : '');  ?> >Showing all of <?php echo $arr['name']; ?></option>
        <?php 
        }
    }
    ?>
</select>

<div class="custombutton">         
    <button class="clicks-btn" onclick="addNew()">
        Add new pet under <?php echo $animal_type_name; ?>
    </button>

    <button class="clicks-btn" onclick="goBack()">
        Back
    </button>

    <button class="clicks-btn" onclick="refreshInnerPanel()">
        Refresh
    </button>
    <span style="display:none;" class="refresh-label">Refreshing...</span>
</div>
<?php
    

    if($con){
        $var = mysqli_query($con,"select * from ".$table_name." where deleted = 0 and animal_type_id = '". $animal_type ."'");
        ?>
        <table style="width: fit-content;">
            <thead>
                <tr style="color: #fff;">
                    <th class="col-a">#</th>
                    <th class="col-b">Name</th>
                    <th class="col-c">Color</th>
                    <th class="col-d">Cost</th>
                    <th class="col-e">Weight</th>
                    <th class="col-f">Age</th>
                    <th class="col-g">Comments</th>
                    <!-- <th class="col-h">Props</th> -->
                    <th class="col-i">Animal Pic Link</th>
                    <th class="col-j">Edit</th>
                    <th class="col-k">Delete</th>
                </tr>
            </thead>
        <?php
            if(mysqli_num_rows($var)>0){
                $i=0;
                while($arr=mysqli_fetch_assoc($var))
                {
                    $i++;
            ?>
            <tbody>
            <tr  class="col-a" style="<?php echo ($arr['deleted'] == 1 ? 'display: none;' : 'display: block;'); ?> /*width: fit-content;*/" >
                <td class="col-a" data="<?php echo $arr['id']; ?>"><?php echo $i; ?></td>
                <td class="col-b" data="<?php echo $arr['name']; ?>"><?php echo $arr['name']; ?></td>
                <td class="col-c" data="<?php echo $arr['color']; ?>"><?php echo $arr['color']; ?></td>
                <td class="col-d" data="<?php echo $arr['cost']; ?>"><?php echo $arr['cost']; ?></td>
                <td class="col-e" data="<?php echo $arr['weight']; ?>"><?php echo $arr['weight']; ?></td>
                <td class="col-f" data="<?php echo $arr['age']; ?>"><?php echo $arr['age']; ?></td>
                <td class="col-g" data="<?php echo $arr['comments']; ?>"><?php echo $arr['comments']; ?></td>
                <!-- <td class="col-h" data="<?php echo $arr['props']; ?>"><?php echo $arr['props']; ?></td> -->
                <td class="col-i" data="<?php echo $arr['animal_pic']; ?>"> <a href="<?php echo $gotoMain. $arr['animal_pic']; ?>" target="_blank"><?php echo substr($arr['animal_pic'], strrpos($arr['animal_pic'], '/') + 1 ); ?></a> </td>

                <td class="col-j">
                    <button 
                        class="clicks-btn"
                        onclick="editRow(this, <?php echo ($arr['id']); ?>)">
                        Edit
                    </button>
                </td>
                <td class="col-k">
                    <button 
                        class="clicks-btn"
                        onclick="deleteRow(<?php echo ($arr['id']); ?>)">
                        Delete
                    </button>
                </td>
            </tr>
            </tbody>
            <?php
                }
            }
            mysqli_free_result($var);
        ?>
        </table>
        <?php
            
        mysqli_close($con);
    }    
?>

<br><br><br>
<div class="entry_form" style="display: none;">
    <h4>Entry Form</h4>
    <form method="post" style="width: 50%; margin-left: 50px;"> 
        <fieldset> 
            <input type="hidden" name="id" class="row-a" value="">
            <input type="hidden" name="operation" class="row-0" value="create">
            <input type="hidden" name="table_name" class="row-1" value="<?php echo $table_name; ?>">
            <input type="hidden" name="animal_type_id" class="row-1" value="<?php echo $animal_type; ?>">

            <?php // var_dump($animal_cat); ?>

            <p class="show-id-box" style="display: none;" > ENTRY ID : <span class="show-id"></span></p>
            <p class="show-id-box" style="display: none;" > ANIMAL CATEGORY : <span class="show-anicatname"><?php echo $animal_cat_name; ?></span></p>
            <p class="show-id-box" style="display: none;" > ANIMAL TYPE : <span class="show-anitypename"><?php echo $animal_type_name; ?></span></p>

            <input type="text" name="name" placeholder="Enter pet name" class="input-el row-b" required>
            <br>

            <input type="text" name="color" placeholder="Enter color of the pet"  class="input-el row-c" >
            <br>

            <input type="text" name="cost" placeholder="Enter cost  in Rs."  class="input-el row-c" >
            <br>

            <input type="text" name="weight" placeholder="Enter weight in kg"  class="input-el row-c" >
            <br>

            <input type="text" name="age" placeholder="Enter age (months)"  class="input-el row-c" >
            <br>

            <input type="text" name="comments" placeholder="Mention any comments if any"  class="input-el row-c" >
            <br>

            <input type="file" name="animal_pic" class="input-el row-d" >
            
        </fieldset>
        <br>
        <button class="clicks-btn save-btn" onclick="saveBtnClick(event, this)">SAVE</button>
        <span style="display:none;" class="refresh-form">Refreshing...</span>

    </form> 
</div>

<br><br>
<script>
    function deleteRow(id){
        let loadPage = <?php echo json_encode($gotoMain); ?> + 'delete_entry.php';
        fetch(loadPage, {
            method: 'POST',
            body: JSON.stringify({
                gotoMain: (<?php echo json_encode($gotoMain); ?>),
                id : id,
                table_name : 'animals'
            }),
            
            // Adding headers to the request
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
            
        })
        .then(resp => resp.text())
        .then(txt => {
            if(txt == '1'){
                alert('Entry deleted successfully')
                refreshInnerPanel()
            } else {
                console.log(txt)
                alert('Some error occurred in deleting Data. '+"\n"+'Please refresh for checking latest info')
            }
        })
    }

    function addNew(){
        $('.entry_form').show()
        $('.entry_form').find('input:not([name="table_name"]):not([name="animal_cat_id"]):not([name="animal_type_id"])').val('')

        let id=''
        $('.entry_form').find('.row-0').val('create')
        // $('.entry_form').find('[name="table_name"]').val('<?php echo $table_name; ?>')
        $('.entry_form').find('.row-a').val(id)
        $('.entry_form').find('.show-id-box .show-id').text(id)
        $('.entry_form').find('.show-id-box').hide()
        $('.entry_form').find('.save-btn').html('ADD')
    }

    function saveBtnClick(e, el){
        if(e)
            e.preventDefault()

        var formData = new FormData()
        $('.entry_form').find('input').each(function(arrIndex, item){
            formData.append(item.name, $(item).val())
        })

        $('.entry_form').find('input[type="file"]').each(function(arrIndex, item){
            formData.append(item.name+"_file", item.files[0])
        })

        
        for(let x of formData){
            console.log(x)
        }

        // return;
        

        let loadPage = 'operation.php';
        $('.refresh-form').show()
        fetch(loadPage, {
            method: 'POST',
            body: formData,
             
            // Adding headers to the request
            /*
            headers: {
                "Content-type": "multipart/form-data; charset=UTF-8"
            }
            */
        })
        .then(resp => {
            console.log(resp)
            return resp.text()
        })
        .then(txt => {
            $('.refresh-form').hide()

            if(txt == '1'){
                alert('Entry saved successfully')
                refreshInnerPanel()
            } else {
                console.log(txt)
                alert('Some error occurred in saving Data. '+"\n"+'Please refresh for checking latest info')
            }
        })
    }

    function editRow(clicked_el, id){
        $('.entry_form').show()
        let $row_el = $(clicked_el).closest('tr')
        $('.entry_form').find('.save-btn').html('UPDATE')
        loadFormWithRowData($row_el.get(), id)
    }

    function loadFormWithRowData(row_el, id){
        console.log(row_el)
        let no = $(row_el).find('td.col-a').text()
        $('.entry_form').find('.row-0').val('edit')
        $('.entry_form').find('.row-a').val(id)
        $('.entry_form').find('.show-id-box .show-id').text(no)
        $('.entry_form').find('.show-id-box').show()
        
        linkdataWithFormEntry('b', row_el)
        linkdataWithFormEntry('c', row_el)
        linkdataWithFormEntry('d', row_el)
    }

    function linkdataWithFormEntry(code, row_el) {
        let $el = $('.entry_form').find('.row-'+ code)
        // console.log($el.is('input'))
        let $data_el = $(row_el).find('td.col-' + code)

        // console.log(1)

        if($el.is('input:not([type="file"])')){
            // console.log(2)
            $el.val( $data_el.attr('data').trim() )
        }

        if($el.is('textarea')){
            // console.log(3)
            $el.val( $data_el.attr('data').trim() )
            $el.html( $data_el.attr('data').trim() )
        }

        if($el.is('a')){
            // console.log(4)
            let set_link = $data_el.attr('data').trim()
            if(typeof(set_link) == 'string' && set_link != ''){
                if($data_el.find('a').length > 0){
                    $el.attr( 'href',  )
                    $el.html( $data_el.find('a').html() )
                }
                else{
                    $el.attr( 'href', $data_el.attr('data').trim() )
                    $el.html( 'view file' )
                }    
            }
        }
    }

    function refreshInnerPanel(el, ev){
        $('.nav-bar').attr('class', 'nav-bar nav-sticky')

        let loadPage = 'animal_form.php';
        $('.refresh-label').show()
        fetch(loadPage, {
            method: 'POST',
            body: JSON.stringify({
                gotoMain: (<?php echo json_encode($gotoMain); ?>) ,
                animal_cat : (<?php echo json_encode($animal_cat); ?>) ,
                animal_type : el ? el.value : $('[name="animal_type_selected"]')[0].value
            }),
             
            // Adding headers to the request
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        })
        .then(resp => resp.text())
        .then(htm => {
            $('.refresh-label').hide()
            $('#formarea').html(htm)
            $('.entry_form').hide()
        })
    }

    function goBack() {
        let loadPage = '<?php echo $gotoMain ?>'+'animal_type_form.php';
        
        fetch(loadPage, {
            method: 'POST',
            body: JSON.stringify({
                gotoMain:  (<?php echo json_encode($gotoMain); ?>),
                animal_cat : (<?php echo json_encode($animal_cat); ?>) ,
            }),
             
            // Adding headers to the request
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        })
        .then(resp => resp.text())
        .then(htm => {
            $('#formarea').html(htm)
        })
    }

</script>

        