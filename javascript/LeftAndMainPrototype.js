/*
SiteTree.prototype.createTreeNode = function(idx, title, pageType) {
	this.reload();
}
*/

SiteTreeNode.prototype.getPageFromServer = function() {
	if (this.id.split('-')[0] == 'eventSection' ){
		return false;
	}
    $('Form_EditForm').getPageFromServer(this.id.replace('record-',''), this);
    _AJAX_LOADING = false;	
}

