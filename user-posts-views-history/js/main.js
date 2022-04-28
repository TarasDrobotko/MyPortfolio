window.onload = function() {
    /*
     * get post data
    */
    var postTitleElem = document.querySelector('.article.border h1');
    if(postTitleElem !== null) {
  var postTitle = document.querySelector('.article.border h1').textContent;
    }
    
    var postDate = new Date().toJSON();

             var url = window.location.href.replace(/\/$/, '');
                var url_split =  url.split( '/' );
                var count_url_parts = url_split.length;
                var lastSegment = url_split.pop();

 /*
  * check if post data exists
 */
function checkIfPostDataExists() {
    for (let key of Object.keys(window.localStorage)) {

        if(key.startsWith('postData_')) {
            return true;
        }
    }
}

/*
* get localStorage posts objects
*/
function getLocalStoragePostsObjects() {
       const localStoragePostsObjects = [];
    
for (let key of Object.keys(window.localStorage)) {

    if(key.startsWith('postData_')) { 
        let item = JSON.parse(localStorage[key]);
         localStoragePostsObjects.push(item);
          localStoragePostsObjects.sort((a, b) => (new Date(a.postDateUnique)) - (new Date(b.postDateUnique)));
          localStoragePostsObjects.reverse();
    }
}

return  localStoragePostsObjects;
}

/*
* get localStorage posts keys ends
*/
function getLocalStoragePostsKeysEnds () {
      const localStoragePostsKeysEnds = [];
    
for (let key of Object.keys(window.localStorage)) {

    if(key.startsWith('postData_')) { 
      keyArr = key.split('_');
      postKeyEnd = parseInt(keyArr[1]);
         localStoragePostsKeysEnds.push(postKeyEnd);
         
    }
   
}
     return localStoragePostsKeysEnds;
}

/* 
* delete item in localStorage if such post id does not exist 
*/
localStoragePostsKeysEndsArr = getLocalStoragePostsKeysEnds();
let postsIdsArr = [];
postsIdsArr = JSON.parse(postsIds);
var MissingPostsIdsArr = localStoragePostsKeysEndsArr.filter(i => !postsIdsArr.includes(i));

if(MissingPostsIdsArr.length) {
    MissingPostsIdsArr.forEach(function(item) {
        
    localStorage.removeItem('postData_'+item);
    });
}
    
    /*
     * save post data in localstorage
    */
            if (count_url_parts >= 5 && window.location.href.indexOf(window.location.origin+'/wp-admin') == -1 && window.location.href.indexOf(window.location.origin+'/page') == -1 && window.location.href.indexOf(window.location.origin+'/category') == -1)  {
                
          
          var localStoragePostKey;
                 jQuery.ajax({
    type: "post",
    dataType: "json",
    async: false,
    url: my_ajax_object.ajax_url,
    data: { 
      action: 'postaction', 
      postUrl: url
    },
    action: 'myaction',
    success: function(postId){
        localStoragePostKey = 'postData_'+ postId;
    }
});

        const postData = {};
                postData.postAddressUnique = url;
                postData.postTitleUnique = postTitle;
                postData.postDateUnique = postDate;
                
                 localStorage.setItem(localStoragePostKey, JSON.stringify(postData));
            }
             
    /*
     * add ul list with posts data
    */
	elementWidget = document.querySelector('.sidebar-widget.widget_widget_your_posts_views_history');
	
	if(elementWidget !== null &&  checkIfPostDataExists() == true) {
	     var ul = document.createElement('ul');
	   elementWidget.appendChild(ul).classList.add('posts-views-history-list');
	    elementUl = document.querySelector('.posts-views-history-list');

	  let titleWidgetTag = beforeTitle.replace('<','');
	  titleWidgetTag = titleWidgetTag.replace('>','');
        let titleElem = document.createElement(titleWidgetTag);
          titleElem.textContent = widgetTitle;
          elementUl.before(titleElem);
	    
	    const html = [];
	    
	    const localStoragePostsObjects = getLocalStoragePostsObjects();

 const lastPosts = localStoragePostsObjects.slice(0, count);
         
    lastPosts.forEach(function(item) {
         let postDate = item.postDateUnique;
         postDate = new Date(postDate);
      
         let postFullYear = postDate.getFullYear();
         let postMonth = postDate.getMonth() + 1;
          if (postMonth < 10) {
              postMonth = '0'+postMonth;
          }
         let postDay = postDate.getDate();
         if(postDay < 10) {
            postDay = '0' + postDay;
         }
         let postDateFormat = postDay+"-"+postMonth+"-"+postFullYear;
      html.push('<li><a href="'+item.postAddressUnique+'">'+item.postTitleUnique+'</a><span>'+postDateFormat+'</span></li>');
    
    });
    
    elementUl.innerHTML = html.join('');
	}
	
}