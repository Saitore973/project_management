
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>


<style>
	body {
		Font-size:20px;
	}
	#notif{
		display:none
	}
	.col-sm-4.project-item {
		
		padding: .5em;
		border-radius: 6px;
		border: 1px solid #0000ff59;
	}
	.col-sm-4.project-item:hover {
		background:#008aff8c;
	}

	.design-hide {
    display: none;
}

	.design-show {
    display: none;
    
}

	.product-hide {
    display: none;
}

</style>

<div class="row">
    <div class="col">
        <div class="card-body">
            <div id="design">
               <i class="fa-solid fa-code"></i> <br>
                <h5>
                    PROJECT IDEATION
                </h5>
            </div>

            <div class="card-body design-hide">
                <p>
                    PROJECT IDEATION <br> Our design practice offers a full range of services including brand <br>
                    strategy,
                    interaction and visual design and user experience testing. <br> Throught your project, our
                    designers create and implement <br> visual design and workflows, solicit user feedback and
                    work with <br> you to make sure what gets built is what is needed."

                </p>
            </div>
        </div>

    </div>
    <div class="col">
        <div class="card-body">
            <div id="develop">
                <img src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.constructionexec.com%2Fassets%2Fsite_18%2Fimages%2Farticle%2F081219110833.jpg%3Fwidth%3D1280&imgrefurl=https%3A%2F%2Fwww.constructionexec.com%2Farticle%2Fthe-fundamentals-of-the-construction-industry-are-strong-but-lingering-workforce-concerns-need-industry-wide-action&tbnid=ahsTMDhrkhPSUM&vet=12ahUKEwj_v436pbf2AhUGcxQKHUy8B9sQMygSegUIARD3AQ..i&docid=LVO4odtaFeRaTM&w=1280&h=853&q=construction&ved=2ahUKEwj_v436pbf2AhUGcxQKHUy8B9sQMygSegUIARD3AQ" alt="">
               <i class="fa-solid fa-code"></i> <br>
                <h5>
                    PROJECT DEVELOPMENT
                </h5>
            </div>


            <div class="card-body design-show">
                <p>
                    PROJECT DEVELOPMENT <br> All engineers are fluent in the latest enterprise, mobile and web <br>
                    development technologies. They collaborate with your team to <br> write, and improve code on
                    a daily basis, using proven practices <br> such as test-driven development and pair
                    programming.
                </p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card-body">
            <div id="product">
               <i class="fa-solid fa-code"></i> <br>
                <h5>
                    PRODUCT MANAGEMENT
                </h5>
            </div>


            <div class="card-body product-hide">
                <p>
                    PRODUCT MANAGEMENT <br> Planning and development is iterative. Because we are constantly
                    <br> codind and testing, the products we build are always ready to go <br> live. This
                    iterative process allows for changes as business <br> requirements evolve.
                </p>
            </div>
        </div>
    </div>

</div>

<div class="col-lg-12" id="project-field">
	<div class="panel panel-primary">
		<div class="panel-body">
			<?php include '../includes/db.php';
			$query = mysqli_query($conn,"SELECT * FROM projects where io = '1' ");
			while($row = mysqli_fetch_assoc($query)){
				?>
				<div class="col-sm-4 project-item">
				<a href="index.php?page=project_detail&id=<?php echo $row['project_id'] ?>&action=view details" style="color:black">
				<center><img src="../images/<?php echo $row["site_pic"] ?>" width="180px" height="230px" alt=""></center>
				<br>
				<center><label style="text-transform:capitalize"><?php echo $row['project'] ?></label></center></a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<div class="col-lg-4" id="notif">
	<div id="" style="">
		
		<?php include '../includes/db.php';
		
		$query1 = mysqli_query($conn,"SELECT * FROM projects where io = '1' ");

		while($row1 = mysqli_fetch_assoc($query1)){
			$d1= date("Ymd",strtotime($row1['deadline'].' -15 days'));
			$d2= date("Ymd");
			 
			if($d2 >= $d1 && date("Ymd",strtotime($row1['deadline'])) > $d2 ){
			?>
			
			<a href="index.php?page=project_detail&id=<?php echo $row1['project_id'] ?>&action=upcoming deadline" style="color:black">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Deadline Soon
					</div>
					<div class="panel-body">
						<center><p><b><?php echo ucfirst($row1['project']) ?></b></p></center>
						<p><i>Deadline:</i><b><?php echo date("F d, Y",strtotime($row1['deadline'])) ?></b></p>
					</div>
				</div>
			</a>
			<?php }elseif(date("Ymd",strtotime($row1['deadline'])) < $d2){ ?>
				<div class="panel panel-danger">
					<div class="panel-heading">
						Deadline Soon
					</div>
					<div class="panel-body">
						<center><p><b><?php echo ucfirst($row1['project']) ?></b></p></center>
						<p><i>Overdue since:</i><b><?php echo date("F d, Y",strtotime($row1['deadline'])) ?></b></p>
					</div>
				</div>
			<?php }} ?>
	</div>
</div>
<script>
	if($('#notif .panel').length > 0){
		$('#project-field').removeClass('col-lg-12').addClass("col-md-8")
		$('#notif').show()
	}
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="script.js"></script>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
<script type='text/javascript'>
    (function ($) {
        window.fnames = new Array();
        window.ftypes = new Array();
        fnames[0] = 'EMAIL';
        ftypes[0] = 'email';
        fnames[2] = 'LNAME';
        ftypes[2] = 'text';
        fnames[4] = 'MMERGE2';
        ftypes[4] = 'phone';
    }(jQuery));
    var $mcj = jQuery.noConflict(true);
</script>


<script>
    $(document).ready(function () {
        $("#design").click(function () {
            $(".design-hide").toggle();
            $("#design").toggle();
        });
    });

    $(document).ready(function () {
        $(".design-hide").click(function () {
            $(".design-hide").toggle();
            $("#design").toggle();
        });
    });

    $(document).ready(function () {
        $("#develop").click(function () {
            $(".design-show").toggle();
            $("#develop").toggle();
        });
    });

    $(document).ready(function () {
        $(".design-show").click(function () {
            $(".design-show").toggle();
            $("#develop").toggle();
        });
    });

    $(document).ready(function () {
        $("#product").click(function () {
            $(".product-hide").toggle();
            $("#product").toggle();
        });
    });

    $(document).ready(function () {
        $(".product-hide").click(function () {
            $(".product-hide").toggle();
            $("#product").toggle();
        });
    });
</script>