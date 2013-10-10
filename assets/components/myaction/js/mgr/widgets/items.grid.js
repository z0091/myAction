
myAction.grid.Items = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'myaction-grid-items'
        ,url: myAction.config.connector_url
        ,baseParams: {
            action: 'mgr/item/getlist'
        }
        ,fields: ['id','head1','head2','description','img','url']
        ,save_action: 'mgr/item/update'
        ,autosave: true
        ,autoHeight: true
        ,paging: true
        ,remoteSort: true
        ,columns: [{
            header: _('id')
            ,dataIndex: 'id'
            ,width: 60
        },{
            header: _('myaction.head1')
            ,dataIndex: 'head1'
            ,editor: {xtype: 'textfield', allowBlank: true}
            ,width: 200
        },{
            header: _('myaction.head2')
            ,dataIndex: 'head2'
            ,editor: {xtype: 'textfield', allowBlank: true}
            ,width: 200
        },{
            header: _('description')
            ,dataIndex: 'description'
            ,editor: {xtype: 'textarea', allowBlank: true}
            ,width: 250
        },{
            header: _('myaction.img')
            ,dataIndex: 'img'
            ,width: 100
            ,renderer: this.renderMyactionImg
        },{
            header: _('myaction.url')
            ,dataIndex: 'url'
            ,hidden: true
            ,width: 120
        }]
        ,tbar: [{
            text: _('myaction.item_create')
            ,handler: this.createItem
            ,scope: this
        }]
    });
    myAction.grid.Items.superclass.constructor.call(this,config);
};
Ext.extend(myAction.grid.Items,MODx.grid.Grid,{
    windows: {}

    ,getMenu: function() {
        var m = [];
        m.push({
            text: _('myaction.item_update')
            ,handler: this.updateItem
        });
        m.push('-');
        m.push({
            text: _('myaction.item_remove')
            ,handler: this.removeItem
        });
        this.addContextMenuItem(m);
    }
    
    ,createItem: function(btn,e) {
        if (!this.windows.createItem) {
            this.windows.createItem = MODx.load({
                xtype: 'myaction-window-item-create'
                ,listeners: {
                    'success': {fn:function() { this.refresh(); },scope:this}
                }
            });
        }
        this.windows.createItem.fp.getForm().reset();
        this.windows.createItem.show(e.target);
    }
    ,updateItem: function(btn,e) {
        if (!this.menu.record || !this.menu.record.id) return false;
        var r = this.menu.record;

        if (!this.windows.updateItem) {
            this.windows.updateItem = MODx.load({
                xtype: 'myaction-window-item-update'
                ,record: r
                ,listeners: {
                    'success': {fn:function() { this.refresh(); },scope:this}
                }
            });
        }
        this.windows.updateItem.fp.getForm().reset();
        this.windows.updateItem.fp.getForm().setValues(r);
        this.windows.updateItem.show(e.target);
    }
    
    ,removeItem: function(btn,e) {
        if (!this.menu.record) return false;
        
        MODx.msg.confirm({
            title: _('myaction.item_remove')
            ,text: _('myaction.item_remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/item/remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': {fn:function(r) { this.refresh(); },scope:this}
            }
        });
    }

    ,renderMyactionImg: function(value) {
        if (/(jpg|png|gif|jpeg)$/i.test(value)) {
            if (!/^\//.test(value)) {value = '/' + value;}
            return '<img src="'+value+'" height="35" />';
        }
        else {
            return '';
        }
    }
});
Ext.reg('myaction-grid-items',myAction.grid.Items);




myAction.window.CreateItem = function(config) {
    config = config || {};
    this.ident = config.ident || 'myaction-mecitem'+Ext.id();
    Ext.applyIf(config,{
        title: _('myaction.item_create')
        ,id: this.ident
        ,height: 150
        ,width: 475
        ,url: myAction.config.connector_url
        ,action: 'mgr/item/create'
        ,fields: [{
            xtype: 'textfield'
            ,fieldLabel: _('myaction.head1')
            ,name: 'head1'
            ,id: this.ident+'-head1'
            ,anchor: '100%'
            ,allowBlank:false
            ,emptyText: _('myaction.emptyText')
        },{
            xtype: 'textfield'
            ,fieldLabel: _('myaction.head2')
            ,name: 'head2'
            ,id: this.ident+'-head2'
            ,anchor: '100%'
        },{
            xtype: 'modx-combo-browser'
            ,fieldLabel: _('myaction.img')
            ,name: 'img'
            ,id: this.ident+'-img'
            ,anchor: '100%'
            ,openTo: 'assets/images/myaction/'
            ,rootVisible: false
            ,allowBlank: false
            ,hideFiles: true
            ,allowBlank:false
            ,emptyText: _('myaction.emptyText')
        },{
            xtype: 'textarea'
            ,fieldLabel: _('description')
            ,name: 'description'
            ,id: this.ident+'-description'
            ,anchor: '100%'
            ,allowBlank:false
            ,emptyText: _('myaction.emptyText')
        },{
            xtype: 'textfield'
            ,fieldLabel: _('myaction.url')
            ,name: 'url'
            ,id: this.ident+'-url'
            ,anchor: '100%'
            ,allowBlank:false
            ,emptyText: _('myaction.emptyText')
        }]
    });
    myAction.window.CreateItem.superclass.constructor.call(this,config);
};
Ext.extend(myAction.window.CreateItem,MODx.Window);
Ext.reg('myaction-window-item-create',myAction.window.CreateItem);


myAction.window.UpdateItem = function(config) {
    config = config || {};
    this.ident = config.ident || 'myaction-meuitem'+Ext.id();
    Ext.applyIf(config,{
        title: _('myaction.item_update')
        ,id: this.ident
        ,height: 150
        ,width: 475
        ,url: myAction.config.connector_url
        ,action: 'mgr/item/update'
        ,fields: [{
            xtype: 'hidden'
            ,name: 'id'
            ,id: this.ident+'-id'
        },{
            xtype: 'textfield'
            ,fieldLabel: _('myaction.head1')
            ,name: 'head1'
            ,id: this.ident+'-head1'
            ,anchor: '100%'
            ,allowBlank:false
            ,emptyText: _('myaction.emptyText')
        },{
            xtype: 'textfield'
            ,fieldLabel: _('myaction.head2')
            ,name: 'head2'
            ,id: this.ident+'-head2'
            ,anchor: '100%'
        },{
            xtype: 'modx-combo-browser'
            ,fieldLabel: _('myaction.img')
            ,name: 'img'
            ,id: this.ident+'-img'
            ,anchor: '100%'
            ,openTo: 'assets/images/myaction/'
            ,rootVisible: false
            ,allowBlank: false
            ,hideFiles: true
            ,allowBlank:false
            ,emptyText: _('myaction.emptyText')
        },{
            xtype: 'textarea'
            ,fieldLabel: _('description')
            ,name: 'description'
            ,id: this.ident+'-description'
            ,anchor: '100%'
            ,allowBlank:false
            ,emptyText: _('myaction.emptyText')
        },{
            xtype: 'textfield'
            ,fieldLabel: _('myaction.url')
            ,name: 'url'
            ,id: this.ident+'-url'
            ,anchor: '100%'
            ,allowBlank:false
            ,emptyText: _('myaction.emptyText')
        }]
    });
    myAction.window.UpdateItem.superclass.constructor.call(this,config);
};
Ext.extend(myAction.window.UpdateItem,MODx.Window);
Ext.reg('myaction-window-item-update',myAction.window.UpdateItem);
