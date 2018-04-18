
var creator=function()
{
var jobA=function(){
alert("job1");
}
var jobB=function(){
alert("job2");
}

return {
job1:jobA,
job2:jobB
};

};



var work=creator();

work.job1();

