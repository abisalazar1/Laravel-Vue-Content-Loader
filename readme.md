
# Laravel-Vue-Content-Loader

Create a list vue component and add a data attr of "ProcessData" and set it as an empty array.
Then Add the content loader component and send through the ContentType that you want to load.
```
<app-content-loader ContentType="User" > </app-content-loader>" and Send the ContentType

```
### Example
```
 <template>
     <div>
         <app-user v-for="user in ProcessData.data"  :user="user"></app-user>
         <app-content-loader ContentType="User" SingleItem=""></app-content-loader>
     </div>
 </template>
 
 <script>
 
     export default{
         data : function () {
             return{
                 ProcessData : [],
             }
         }
     }
 </script>

```
## Routing

Add a new route. 
```
Route::get('/load', 'ContentLoader\CoreMainLoader\ContentLoaderHandler@LoadContent');

```

- Note: By Default the url is load and it is type GET, this can be change with in the config.
```
   ContentLoaderConfig : {
        RequestType: 'GET',
        AutoLoadContent: true,
        LoadBtnText : "Load More",
        Url: 'load'

    }
```
## Creating ContentLoader Type Controller

- Create a new controller and name it. {RequestType}ContentLoader.
- Controller should extend MainContentLoader.
- Controller should return a query. 
- Main Controller will automatically call the pagination method on the query. You do not have to add this.
- You can overwrite the number of results retrieved by the database by setting a protected pagination attr.
- You will have a single access to a SingleItem Attribute.
### Example
```
UserContentLoader -- For users
PostContentLoader -- For posts
CommentContentLoader -- For comments

```
### Controller Example
```

namespace App\Http\Controllers\ContentLoader;
use App\User;
use App\Http\Controllers\ContentLoader\CoreMainLoader\MainContentLoader;

class UserContentLoader extends MainContentLoader
{
    protected $Pagination = 4;

    public function execute()
    {
        if($this->SingleItem){
            return (new User())->newQuery()->where('id',$this->SingleItem);
        }
        return (new User())->newQuery();
    }
}
```



## Validation

By default there is a ContentLoaderRequest Validation under the request Folder.
```
   public function rules()
    {
        return [
            'ContentType' => ['required',
                Rule::in(['User','Post'])],
            'SingleItem' => ['']
        ];
    }
```
- Make sure you add the type of your content type to the validation.
- Make sure your ContentType matches with the controller Type that was created before.

### Example
```
User matches UserContentLoader
Post matches PostContentLoader
Comment matches CommentContentLoader
```

## License
The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
 