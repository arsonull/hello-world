package data;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

import javax.ejb.Local;
import javax.ejb.LocalBean;
import javax.ejb.Stateless;

import beans.Post;
@Stateless
@Local(DataAccessInterface.class)
@LocalBean
public class PostDataService implements DataAccessInterface<Post>
{

	public PostDataService()
	{
		
	}
	
	@Override
	public List<Post> findAll() 
	{
		Connection conn = null;
		String url = "jdbc:postgresql://localhost:5432/postgres";
		String username = "postgres";
		String password = "root";
		String sql = "SELECT * FROM tchan.posts";
		List<Post> posts = new ArrayList<Post>();
		try
		{
			conn = DriverManager.getConnection(url, username, password);
			System.out.println("HEYYYYYY GOT CONNNNNNNN");
			
			Statement stmt = conn.createStatement();
			ResultSet rs = stmt.executeQuery(sql);
			while (rs.next())
			{
				posts.add(new Post(rs.getString("title"), rs.getString("content"), rs.getInt("u_id")));
			}
			
			rs.close();
		}
		catch (SQLException e)
		{
			e.printStackTrace();
			System.out.println("Aiden is bad at Overwatch");
			System.exit(0);
		}
		finally
		{
			if(conn != null)
			{
				try
				{
					conn.close();
				}
				catch (SQLException e)
				{
					//e.printStackTrace();
					System.out.println("Aiden is a power bottom");
				}
			}
		}
		return posts;
	}

	@Override
	public boolean create(Post post)
	{
		Connection conn = null;
		String url = "jdbc:postgresql://localhost:5432/postgres";
		String username = "postgres";
		String password = "root";
		String title = post.getTitle();
		String content = post.getContent();
		//int u_id = post.getUID();
		int u_id = 1;
		String sql = "INSERT INTO tchan.posts(title, content, u_id) VALUES ('" + title + "', '" + content + "', " + u_id + ")";
		try
		{
			conn = DriverManager.getConnection(url, username, password);
			
			Statement stmt = conn.createStatement();
			stmt.executeUpdate(sql);
			stmt.close();
		}
		catch (SQLException e)
		{
			e.printStackTrace();
		}
		finally
		{
			if(conn != null)
			{
				try
				{
					conn.close();
				}
				catch (SQLException e)
				{
					e.printStackTrace();
				}
			}
		}
		return true;
	}

	@Override
	public boolean update(Post post) {
		Connection conn = null;
		String url = "jdbc:postgresql://localhost:5432/postgres";
		String username = "postgres";
		String password = "root";
		String title = post.getTitle();
		String content = post.getContent();
		int id = post.getID();
		String sql = "UPDATE tchan.posts SET TITLE = " + title + ", CONTENT = " + content + " WHERE ID = " + id;
		try
		{
			conn = DriverManager.getConnection(url, username, password);
			
			Statement stmt = conn.createStatement();
			ResultSet rs = stmt.executeQuery(sql);
			rs.close();
		}
		catch (SQLException e)
		{
			e.printStackTrace();
		}
		finally
		{
			if(conn != null)
			{
				try
				{
					conn.close();
				}
				catch (SQLException e)
				{
					e.printStackTrace();
				}
			}
		}
		return true;
	}

	@Override
	public boolean delete(Post post) {
		Connection conn = null;
		String url = "jdbc:postgresql://localhost:5432/postgres";
		String username = "postgres";
		String password = "root";
		int id = post.getID();
		String sql = "DELETE FROM tchan.posts WHERE ID = " + id;
		try
		{
			conn = DriverManager.getConnection(url, username, password);
			
			Statement stmt = conn.createStatement();
			ResultSet rs = stmt.executeQuery(sql);
			rs.close();
		}
		catch (SQLException e)
		{
			e.printStackTrace();
		}
		finally
		{
			if(conn != null)
			{
				try
				{
					conn.close();
				}
				catch (SQLException e)
				{
					e.printStackTrace();
				}
			}
		}
		return true;
	}
	
	@Override
	public Post findPost(int id) 
	{
		Connection conn = null;
		String url = "jdbc:postgresql://localhost:5432/postgres";
		String username = "postgres";
		String password = "root";
		String sql = "SELECT * FROM tchan.posts WHERE id = " + id + "";
		Post post = new Post();
		try
		{
			conn = DriverManager.getConnection(url, username, password);
			System.out.println("HEYYYYYY GOT CONNNNNNNN");
			
			Statement stmt = conn.createStatement();
			ResultSet rs = stmt.executeQuery(sql);
			post.setTitle(rs.getString("title"));
			post.setContent(rs.getString("content"));
			rs.close();
		}
		catch (SQLException e)
		{
			e.printStackTrace();
			System.out.println("Aiden is bad at Overwatch");
			System.exit(0);
		}
		finally
		{
			if(conn != null)
			{
				try
				{
					conn.close();
				}
				catch (SQLException e)
				{
					//e.printStackTrace();
					System.out.println("Aiden is a power bottom");
				}
			}
		}
		return post;
	}

}
