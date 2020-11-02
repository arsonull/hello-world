package project5;

import java.io.File;
import java.io.FileNotFoundException;
import java.util.Scanner;

public class main {

	public static void main(String[] args)
	{
		try
		{
			File file = new File("slop.txt");
			Scanner reader = new Scanner(file);
			int c = 0;
			while (reader.hasNextLine())
			{
				c++;
				String test = reader.nextLine();
				if (isSlip(test))
				{
					System.out.println("Line #" + c + " is as Slip");
				}
				else if (isSlap(test))
				{
					System.out.println("Line #" + c + " is a Slap");
				}
				else
				{
					System.out.println("Line #" + c + " is nothing");
				}
			}
		}
		catch (FileNotFoundException e)
		{
			e.printStackTrace();
		}
	}
	
	public static boolean isSlip(String string)
	{
		int count = 0;
		char[] str = string.toCharArray();
		if (str[0] == 'D' || str[0] == 'E') 
		{
			count++;
			while(str[count] == 'F')
			{
				count++;
			}
			if(str[count] == 'D' || str[count] == 'E')
			{
				char[] n = new char[string.length() - count];
				for (int i = 0; i < string.length() - count; i++)
				{
					n[i] = str[count];
					count++;
				}
				return isSlip(n.toString());
			}
			else if (str[count] == 'G')
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
	public static boolean isSlap(String string)
	{
		int count = 0;
		char[] str = string.toCharArray();
		if(str[0] == 'A')
		{
			count++;
			if (str[count] == 'H' && string.length() == 2)
			{
				return true;
			}
			else if (string.length() == 2)
			{
				return false;
			}
			if (str[count] == 'B')
			{
				char[] n = new char[string.length() - count];
				for (int i = 0; i < string.length() - count; i++)
				{
					n[i] = str[count];
					count++;
				}
				if (isSlap(n.toString()))
				{
					if (str[count] == 'C')
					{
						return true;
					}
					else
					{
						return false;
					}
				}
			}
			else
			{
				char[] n = new char[string.length() - count];
				for (int i = 0; i < string.length() - count; i++)
				{
					n[i] = str[count];
					count++;
				}
				if (isSlip(n.toString()))
				{
					if (str[count] == 'C')
					{
						return true;
					}
				}
				else
				{
					return false;
				}
			}
		}
		return false;
	}
	
	public static boolean isSlop(String string)
	{
		return false;
	}
}
