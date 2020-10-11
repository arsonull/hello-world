import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.Reader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

public class Driver {

    public static void main(String[] args) throws IOException
    {
    	try
    	{
	        URL urlConnnect = new URL("");
	        HttpURLConnection con = (HttpURLConnection) urlConnnect.openConnection();
	        con.setRequestMethod("GET");
	        //10 second timeout
	        con.setConnectTimeout(10000);
	        con.setReadTimeout(10000);
	
	        int status = con.getResponseCode();
	
	        Reader streamReader = null;
	
	        if (status > 299) {
	            streamReader = new InputStreamReader(con.getErrorStream());
	        } else {
	            streamReader = new InputStreamReader(con.getInputStream());
	
	            BufferedReader in = new BufferedReader(streamReader);
	            String inputLine;
	            StringBuffer content = new StringBuffer();
	            while ((inputLine = in.readLine()) != null) {
	                content.append(inputLine);
	            }
	            in.close();
	        }
	
	        con.disconnect();
    	}
    	catch(MalformedURLException e)
    	{
    		e.printStackTrace();
    	}
    	catch (IOException e)
    	{
    		e.printStackTrace();
    	}

    }
}