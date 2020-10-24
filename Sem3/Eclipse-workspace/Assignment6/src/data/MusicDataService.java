package data;

import beans.Album;
import beans.Track;
import util.DatabaseException;

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

@Stateless
@Local(DataAccessInterface.class)
@LocalBean
public class MusicDataService implements DataAccessInterface<Album>
{
	@Override
	public Album findBy(Album album)
	{
		Connection conn = null;
		String url = "jdbc:mysql://localhost:3306/";// + database name
		String username = "root";
		String password  = "root";
		
		try
		{
			conn = DriverManager.getConnection(url, username, password);
			String sql1 = String.format("SELECT * FROM ALBUM WHERE TITLE='%S' AND ARTIST='%S' AND YEAR=%d",
					album.getTitle(), album.getArtist(), album.getYear());
			Statement stmt1 = conn.createStatement();
			ResultSet rs1 = stmt1.executeQuery(sql1);
			if (!rs1.next())
			{
				rs1.close();
				stmt1.close();
				return null;
			}
			
			album.setTitle(rs1.getString("TITLE"));
			album.setArtist(rs1.getString("ARTIST"));
			album.setYear(rs1.getInt("YEAR"));
			
			List<Track> tracks = new ArrayList<Track>();
			String sql2 = "SELECT * FROM TRACK WHERE ALBUM_ID = " + rs1.getInt("ID");
			Statement stmt2 = conn.createStatement();
			ResultSet rs2 = stmt2.executeQuery(sql2);
			while (rs2.next())
			{
				tracks.add(new Track(rs2.getString("TITLE"), rs2.getInt("NUMBER")));
			}
			album.setTracks(tracks);
			
			rs2.close();
			stmt2.close();
			rs1.close();
			stmt1.close();
		}
		catch (SQLException e)
		{
			e.printStackTrace();
			throw new DatabaseException(e);
			//throw new DatabaseException(e);
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
					throw new DatabaseException(e);
				}
			}
		}
		return album;
	}

	@Override
	public boolean create(Album t) {
		// TODO Auto-generated method stub
		//remember to use .executeUpdate rather than .executeQuery
		return false;
	}
}
