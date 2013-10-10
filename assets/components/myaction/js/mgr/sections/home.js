Ext.onReady(function() {
    MODx.load({ xtype: 'myaction-page-home'});
});

myAction.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'myaction-panel-home'
            ,renderTo: 'myaction-panel-home-div'
        }]
    }); 
    myAction.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(myAction.page.Home,MODx.Component);
Ext.reg('myaction-page-home',myAction.page.Home);
