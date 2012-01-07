/**
 * Created by JetBrains PhpStorm.
 * User: weiwei
 * Date: 11-12-29
 * Time: 上午9:12
 * To change this template use File | Settings | File Templates.
 */

function reloadpage(){
    window.location.reload(true);
}


//打印
function printPage(oper)
{
    if (oper < 10){
        bdhtml=window.document.body.innerHTML;//获取当前页的html代码
        sprnstr="<!--startprint"+oper+"-->";//设置打印开始区域
        eprnstr="<!--endprint"+oper+"-->";//设置打印结束区域
        prnhtml=bdhtml.substring(bdhtml.indexOf(sprnstr)+18); //从开始代码向后取html
        prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));//从结束代码向前取html
        window.document.body.innerHTML=prnhtml;
        window.print();
        window.document.body.innerHTML=bdhtml;
        window.location.reload(true);
    } else {
        window.print();
        window.location.reload(true);
    }
}

//打印预览
function printReview(){
    document.all.WebBrowser.ExecWB(7,1);
}

function printSetting(){
    document.all.WebBrowser.ExecWB(8,1);
}