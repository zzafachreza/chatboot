<style type="text/css">
	.float{
  position:fixed;
  width:100px;
  height:100px;
  bottom:20px;
  right:50px;
  /*border:1px solid black;*/
  text-align:center;
  justify-content: :center;
  align-items: center;
  z-index: 999;
  -webkit-animation: whatsapp 3s infinite alternate;
  /*box-shadow: 1px 2px 15px black;*/
}
.float:hover{
	cursor: pointer;
}


#pesan{
  position:fixed;
  /*width:100px;*/
  /*height:100px;*/
  bottom:0;
  right:10px;
  /*border:1px solid black;*/
  text-align:center;
  justify-content: :center;
  align-items: center;
  z-index: 999;
  box-shadow: 1px 2px 15px gray;
  border-radius: 20px;
}


@keyframes whatsapp {
   from { transform: scale(0.9,0.9); }
      to { transform: scale(1,1); }
}
@-webkit-keyframes whatsapp {
   from { transform: scale(0.9,0.9); }
      to { transform: scale(1,1); }
}

#isi:focus { 
    outline: none !important;
    border-color: #719ECE;
    box-shadow: 0 0 10px #719ECE;
}

#pesan{
	display: none
}

.kiri{
	float: left;background-color: #E2E3E4;width: 70%;text-align: left;padding:10px;border-top-left-radius: 10px;border-bottom-right-radius: 10px;margin-bottom: 5px;
}

.kanan span{
	float: right;
}

.kanan{
	float: right;background-color: #DCF8C6;width: 70%;text-align: right;padding:10px;border-top-right-radius: 10px;border-bottom-left-radius: 10px;margin-bottom: 5px;
}

.kiri span{
	float: right;
}
</style>


    <div href="#" class="float">
    <!-- 	<span style="position: absolute;right: 0;background-color: orange;width: 30px;height: 30px;border-radius: 15px;justify-content: center;align-items: center;color:#FFF;box-shadow: 1px 2px 15px gray">1</span> -->
    	<img src="<?php echo base_url() ?>assets/chat.gif" width="100">
   </div>


    <div href="#" id="pesan">
    	<div class="modal-content" style="width: 350px;border-top-left-radius: 10px;border-top-right-radius: 10px">
      <div class="modal-header" style="background-color: #009688;color: #FFF;border-top-left-radius: 10px;border-top-right-radius: 10px">
        <h4 class="modal-title">Chatboot <?php echo $_SESSION['nama_lengkap'] ?></h4>
        <button id="tutup" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 20px">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="list-pesan" style="height: 450px;overflow-y: auto;">
     	
     

   
   
   
      </div>
      <div class="modal-footer">
   
        	<form id="dataForm">
        		<div style="width: 250px;float: left">
        		<input id="isi" type="text" name="isi" style="width: 100%;height: 40px;resize: none;border-top-left-radius: 5px;border-bottom-left-radius: 5px;border-top: 1px solid orange;border-bottom: 1px solid orange;border-left: 1px solid orange;border-right: 0px;padding-top: 0px;padding-left: 5px" placeholder="masukan pesan" required="required" autocomplete="off" />
        	</div>
        	<div style="width: 70px;float: left;margin-left: 0px;">
        		<button id="kirim" style="width: 100%;height: 40px;background-color: orange;border: 0px;color: #FFF;border-top-right-radius: 5px;border-bottom-right-radius: 5px"><i class="fa fa-send"></i></button>
        	</div>
        	</form>

      </div>
    </div>
   </div>


   <script type="text/javascript">


$("#dataForm").submit(function(e){
	e.preventDefault();
	var id = <?php echo $_SESSION['userid'] ?>;
	var tipe = "kanan";
	var isi = $('#isi').val();



	console.log(id + tipe + isi);
	addData(id,tipe,isi)

   ScrollToBottom();


})

   	 $("#tutup").click(function(e){
   		e.preventDefault();
   		$("#pesan").fadeOut();
   		$('.float').fadeIn();
   	})
    
   	$(".float").click(function(e){
   		e.preventDefault();
   		$(this).hide();
   		$("#pesan").fadeIn();
   		$("#isi").focus();
   		ScrollToBottom();
   	})

   	function ScrollToBottom() {
   		console.log('sroll bawah')
      var objDiv = document.getElementById("list-pesan");
     objDiv.scrollTop = objDiv.scrollHeight;
	}
   	

   	function getData(){

	   	$.ajax({
	   		url:'<?php echo base_url()?>mahasiswa/chatboot_list_data',
	   		type:'GET',
	   		success:function(data){
	   			// console.log(data);

	   			
	   
	   			$('#list-pesan').html(data);
	   	    ScrollToBottom();
	   		}
	   	})
   	}

   	function addData(user_id,pesan_tipe,pesan_isi){
       
   		 	$.ajax({
	   		url:'<?php echo base_url()?>mahasiswa/chatboot_list_add',
	   		type:'POST',
	   		data:{
	   			user_id:user_id,
	   			pesan_isi:pesan_isi,
	   			pesan_tipe:pesan_tipe
	   		},
	   		success:function(data){
	   

	   			console.log(data);
	   			$('#isi').val("");
	   			getData();


	   			setTimeout(function(){
	   				addDataBoot(user_id,pesan_isi);

	   			},2000)
	   			
	   			// $('#list-pesan').html(data);
	   		}
	   	})
   	}

    function addDataBoot(user_id,pesan_isi){
   		 	$.ajax({
	   		url:'<?php echo base_url()?>mahasiswa/chatboot_list_addboot',
	   		type:'POST',
	   		data:{
	   			user_id:user_id,
	   			pesan_isi:pesan_isi,
	   			pesan_tipe:'kiri'
	   		},
	   		success:function(data){
	   			console.log(data);
	   			getData();


	   			// $('#list-pesan').html(data);
	   		}
	   	})
   	}

   	// untuk get data pesan
	getData();


   </script>