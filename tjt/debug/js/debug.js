var Debug={
    open_door:0, //开门
    close_door:1, //关门
    open_r_door:2, //开压缩门
    close_r_door:3,//关压缩门
    red:8,  //红灯
    green:9, // 绿灯
    blue:10,//蓝灯
    turn_off:11, //关灯
    belt_in:4, //传送瓶子进去
    belt_out:5, //退出樽
    start_compress:6,//开启压缩
    stop_compress:7,//关闭压缩
    
    quit:12,  //关闭rvm回到桌面
    restart:13, //重启电脑
}

function debug(f){
    htmlapi.ToDebug(f);
}