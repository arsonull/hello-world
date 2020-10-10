package business;
import java.util.List;

import javax.ejb.Local;

import beans.Post;
import beans.Posts;

@Local
public interface PostBusinessInterface {
	public void test();
	public List<Post> getPosts();
	public void setPosts(List<Post> posts);
	public void newPost(Post post);
	public void editPost(int id, String title, String content);
	public void deletePost(Post post);
}

