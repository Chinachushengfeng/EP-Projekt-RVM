var Flow={
    bottle:0,
    login_1:1,
    login_2:2,
    flow_show:3,
    flow_run:4,
    recycleing:5,
    recycle_success:6,
    overweight:7,
    barcode_error:8,
    recycled:9,
    count:10,
    overflow:11,
    alipay:12,
    debug:13,
    barcode:14,
    alipay_error:15,
}

var Debug={
    open_door:0,
    close_door:1,
    red:2,
    green:3,
    blue:4,
    turn_off:5,
    start_bar:6,
    weight:7,
    start_rotate:8,
    stop_rotate:9,
    belt_in:10,
    belt_out:11,
    belt_up:12,
    belt_dowm:13,
    open_r_door:14,
    close_r_door:15,
    start_compress:16,
    stop_compress:17,
    return_home:18,
    open_light:19,
    close_light:20,
    quit:21,
    restart:22,
    clean_box:23,
	barcode:24,
}

function jump_to(f){
    xfjianpan(false);
    $("#bottle").hide();
    $("#login-1").hide();
    $("#login-2").hide();
    $("#flow-show").hide();
    $("#start").hide();
    $("#flow-run").hide();
    $("#bottom-flow").hide();
    $("#barcode").hide();
    $("#recycleing").hide();
    $("#recycle-success").hide();
    $("#overweight").hide();
    $("#barcode-error").hide();
    $("#recycled").hide();
    $("#count").hide();
    $("#overflow").hide();
    $("#mask").hide();
    $("#alipay").hide();
    $("#machine").show();
    $("#debug").hide();
	$("#bar_in").hide();
	$("#alipay_error").hide();
    switch(f){
        case Flow.bottle:$("#bottle").show();$("#mask").show();$("#machine").hide();nohuman();break;
        case Flow.login_1:$("#login-1").show();time_out_jump(10,"login-1");break;
        case Flow.login_2:$("#login-2").show();time_out_jump(30,"login-2");break;
        case Flow.flow_show:htmlapi.getMachineData();open_qr();$("#flow-show").show();$("#start").show();time_out_jump(10,"start");break;
        case Flow.flow_run:$("#flow-show").show();$("#flow-run").show();$("#bottom-flow").show();set_flow_status(1);$("#barcode").show();break;
        case Flow.recycleing:$("#flow-show").show();$("#flow-run").show();$("#bottom-flow").show();set_flow_status(2);$("#recycleing").show();break;
        case Flow.recycle_success:$("#flow-show").show();$("#flow-run").show();$("#bottom-flow").show();set_flow_status(3);$("#recycle-success").show();break;
        case Flow.overweight:$("#flow-show").show();$("#flow-run").show();$("#bottom-flow").show();set_flow_status(1);$("#overweight").show();break;
        case Flow.barcode_error:$("#flow-show").show();$("#flow-run").show();$("#bottom-flow").show();set_flow_status(1);$("#barcode-error").show();break;
        case Flow.recycled:$("#flow-show").show();$("#flow-run").show();$("#bottom-flow").show();set_flow_status(3);$("#recycled").show();break;
        case Flow.count:$("#flow-show").show();$("#flow-run").show();$("#bottom-flow").show();set_flow_status(3);$("#count").show();time_out_jump(20,"count");break;
        case Flow.overflow:$("#overflow").show();break;
        case Flow.alipay:$("#flow-show").show();$("#alipay").show();break;
        case Flow.alipay_error:$("#flow-show").show();$("#alipay_error").show();break;
        case Flow.debug:$("#debug").show();break;
		case Flow.barcode:$("#bar_in").show();break;
    }
}

// function login(){
//     xfjianpan(false);
//     var id = $("#tel");
//     var pw = $("#psw");
//     ids = id.val();
//     pws = pw.val();
//     id.val("");
//     pw.val("");
//     console.log(ids);
//     console.log(ids.length);
//     id.attr('placeholder','手機號碼');
//     pw.attr('placeholder','密碼');
//     if(ids==""){
//         console.log("hello");
//         htmlapi.authentication();
//     }
//     else if(ids.length<7)id.attr('placeholder','请输入正确手机号');
//     else if(pws.length!=6)pw.attr('placeholder','密码长度为6');
//     else{
//         htmlapi.authentication(ids,pws);
//     }
// }

// function set_user_jump(tel){
//     if(tel!="")$("#user").html("會員 "+tel);
//     else $("#user").html("非會員");
//     jump_to(3);
// }

// function set_placeholder(){
//     var id = $("#tel");
//     var pw = $("#psw");
//     id.attr('placeholder','手機號碼');
//     pw.attr('placeholder','密碼错误');
// }

function set_flow_status(i){
    $("#bottom-flow").children()[1].style.backgroundColor = '#7c7c7c';
    $("#bottom-flow").children()[2].style.backgroundColor = '#7c7c7c';
    $("#bottom-flow").children()[3].style.backgroundColor = '#7c7c7c';
    $("#bottom-flow").children()[4].style.backgroundColor = '#7c7c7c';
    switch(i){
        case 3:$("#bottom-flow").children()[3].style.backgroundColor = '#FCC000';$("#bottom-flow").children()[4].style.backgroundColor = '#24B38D';
        case 2:$("#bottom-flow").children()[1].style.backgroundColor = '#E74165';$("#bottom-flow").children()[2].style.backgroundColor = '#FCC000';
        case 1:;
    }
}

//设置机器型号
function set_machine_id(id,number){
    $("#machine-id").html(id);
    set_machine_number(number);
}

//设置机器回收瓶子个数
function set_machine_number(number){
    $("#machine-number").html(number);
}

//设置用户本次回收量
function set_user_number(number){
    $("#show-number").html(number);
}

//设置用户数据 本次回收量，钱，总回收量，钱
function set_user_data(numberT,moneyT,numberA,moneyA){
    $("#r-number-this").html(numberT);
    $("#r-money-this").html('$'+moneyT);
   // $("#r-number-all").html(numberA);
   // $("#r-money-all").html('$'+moneyA);
}

function start(){
    htmlapi.start();
}

function stop(){
    htmlapi.stop();
}

function nohuman(){
    htmlapi.nohuman();
}

function human(){
    htmlapi.human();
    jump_to(Flow.flow_show);
}

function ishuman(){
    var display =$('#mask').css('display');
    if(display == 'block'){
        jump_to(Flow.flow_show);
    }
}

nohuman();
//ailipay
function toalipay(){
    jump_to(12);
    htmlapi.alipay();
}
//bdt
function tobdt(){
    htmlapi.bdt();
}
//打印
function printstr(){
    htmlapi.printstr();
}

//定时跳转
function time_out_jump(count,id) {      
    var divs = $("#"+id);
    console.log("count=>"+id+":"+count);
    window.setTimeout(function(){    
        count--;    
        if(count <= 0&&divs.css('display')=='block') { 
            jump_to(0); 
        }else if(divs.css('display')=='none'){
            count = 0;
        } else{
            time_out_jump(count,id);
        }   
    }, 3000);    
}    


function paika(num){
	
window.location.href="index.php?qty="+num;
	
}

//二维码扫码
function open_qr(){
    htmlapi.openQr();
}

function close_qr(){
    htmlapi.closeQr();
}

function debug(f){
    htmlapi.toDebug(f);
}

function add_barcode(){
	jump_to(Flow.barcode);
	debug(Debug.barcode);
}
function show_barcode(barcode){
	var str;
	    if(barcode.length==13){
		str = barcode.substring(0, 1)+" "+barcode.substring(1, 7)+" "+barcode.substring(7, 13);
		//console.log(str);
	}else if(barcode.length==8){
		str = barcode.substring(0, 4)+" "+barcode.substring(4, 8);
	}
	else{
		str = barcode;
	}
	$("#barcode-show").html(str);
}

function barcode_comfirm(){
	htmlapi.comfirm();
	$("#barcode-show").html("请扫描");
}

function barcode_cancel(){
	htmlapi.cancel();
	$("#barcode-show").html("请扫描");
}

function barcode_back(){
	htmlapi.back();
	$("#barcode-show").html("请扫描");
	jump_to(Flow.debug);
	
}
//键盘部分
function xfjianpan(id) {
    //xfjianpan(id),当id为input的id，如果id==false时，键盘隐藏

    var jpnub = $("#xfjp td").length;

    $("#xfjp td").unbind("click");

    if (id != false) {          
        $("#jianpan").show();
        var xfjp_text = $("#"+id).val();                        //获取input框当前的val值

        $("#xfjp td").click(function () {
            var click = $(this).html();                         //获取点击按键的内容

            //特殊按键在这添加事件
            //判断点击的按键是否有特殊事件，如果没有则按键内容加在input文本后面
            if (click == "Clean") {
                xfjp_text = "";
            }else if(click == "Back"){
                    xfjp_text = xfjp_text.substr(0,xfjp_text.length-1);
            }else if(click == "Quite"){

            }else if(click == "OK"){

            }else {
                if((xfjp_text.length<11&&id=="tel")||(xfjp_text.length<6&&id=="psw"))
                    xfjp_text = xfjp_text + click;
            }
            $("#"+id).val(xfjp_text);
            $("#"+id).focus();
        })
    }else{
        $("#jianpan").hide();
    }
}
