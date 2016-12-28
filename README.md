# oc-blogapi-plugin

A simple HTTP API for [RainLab.Blog](https://github.com/rainlab/blog-plugin).

- [Categories](#categories)
- [Category](#category)
- [Posts](#posts)
- [Post](#post)

<a name="categories"></a>
### Categories

**Route::** `(get) /api/rainlab/blog/categories`

| Param  | Description                                                        |
|--------|--------------------------------------------------------------------|
| select | CSV of columns to select.                                          |
| order  | Comma seperated column and direction to sort by (example `id,asc`) |
| with   | CSV of relationships to eager load.                                |
| skip   | Number of results to skip.                                         |
| take   | Number of results to take.                                         |

<a name="category"></a>
### Category

**Route:** `(get) /api/rainlab/blog/categories/{id}`

| Param  | Description                                                        |
|--------|--------------------------------------------------------------------|
| select | CSV of columns to select.                                          |
| with   | CSV of relationships to eager load.                                |

<a name="posts"></a>
### Posts

**Route:** `(get) /api/rainlab/blog/posts`

| Param  | Description                                                        |
|--------|--------------------------------------------------------------------|
| select | CSV of columns to select.                                          |
| order  | Comma seperated column and direction to sort by (example `id,asc`) |
| with   | CSV of relationships to eager load.                                |
| skip   | Number of results to skip.                                         |
| take   | Number of results to take.                                         |

<a name="post"></a>
### Post

**Route:** `(get) /api/rainlab/blog/posts/{slug}`

| Param  | Description                                                        |
|--------|--------------------------------------------------------------------|
| select | CSV of columns to select.                                          |
| with   | CSV of relationships to eager load.                                |
