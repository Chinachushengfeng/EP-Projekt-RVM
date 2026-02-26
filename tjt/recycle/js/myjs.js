var Page={
    warpper:0,
    start:1,
    put:2,
    success:3,
    barcode:4,
    weight:5,
    count:6,
}

function jump_to(f){
    $("#warpper").hide();
    $("#app").hide();
    $(".page-start").hide();
    $(".page-put").hide();
    $(".page-success").hide();
    $(".error-barcode").hide();
    $(".error-weight").hide();
    $(".page-count").hide();
    switch(f){
        case Page.warpper:$("#warpper").show();break;
        case Page.start:$("#app").show();$(".page-start").show();break;
        case Page.put:$("#app").show();$(".page-put").show();break;
        case Page.success:$("#app").show();$(".page-success").show();break;
        case Page.barcode:$("#app").show();$(".error-barcode").show();break;
        case Page.weight:$("#app").show();$(".error-weight").show();break;
        case Page.count:$("#app").show();$(".page-count").show();break;
    }
}

function setBottle(num){
    $("#bottle-num").html(num);
	
	

}

function point(point,bottle){
    $("#integral").html(point);
    $("#drink").html(bottle);
}

function start(){
    htmlapi.Start();
}

function finish(){
    htmlapi.Finish();
}

function reward(){
    htmlapi.Reward();
}

function printer(){
    htmlapi.Printer();
}