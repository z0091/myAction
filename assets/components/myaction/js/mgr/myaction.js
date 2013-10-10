var myAction = function(config) {
    config = config || {};
    myAction.superclass.constructor.call(this,config);
};
Ext.extend(myAction,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {},view: {}
});
Ext.reg('myaction',myAction);

myAction = new myAction();
