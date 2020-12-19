package project8;

import java.util.Stack;

public class Map
{
	private int[][] map = new int[15][15];
	
	public Map()
	{
		map[0][1] = 14;
		map[0][11] = 14;
		map[0][12] = 9;
		map[1][0] = 14;
		map[1][2] = 9;
		map[1][10] = 17;
		map[1][11] = 9;
		map[2][1] = 9;
		map[2][3] = 5;
		map[2][9] = 20;
		map[2][10] = 13;
		map[3][2] = 5;
		map[3][4] = 17;
		map[3][9] = 19;
		map[4][3] = 17;
		map[4][5] = 16;
		map[4][9] = 4;
		map[5][4] = 16;
		map[5][6] = 8;
		map[5][7] = 9;
		map[5][9] = 12;
		map[6][5] = 8;
		map[6][7] = 6;
		map[7][5] = 9;
		map[7][6] = 6;
		map[7][8] = 7;
		map[7][9] = 12;
		map[7][13] = 23;
		map[7][14] = 10;
		map[8][7] = 7;
		map[8][9] = 13;
		map[8][10] = 5;
		map[8][14] = 6;
		map[9][2] = 20;
		map[9][3] = 19;
		map[9][4] = 4;
		map[9][5] = 12;
		map[9][7] = 12;
		map[9][8] = 13;
		map[9][10] = 7;
		map[10][1] = 17;
		map[10][2] = 13;
		map[10][8] = 5;
		map[10][9] = 7;
		map[10][11] = 18;
		map[10][14] = 8;
		map[11][0] = 14;
		map[11][1] = 9;
		map[11][10] = 18;
		map[11][12] = 15;
		map[11][14] = 9;
		map[12][0] = 9;
		map[12][11] = 15;
		map[12][13] = 11;
		map[12][14] = 15;
		map[13][7] = 23;
		map[13][12] = 11;
		map[13][14] = 18;
		map[14][7] = 10;
		map[14][8] = 6;
		map[14][10] = 8;
		map[14][11] = 9;
		map[14][12] = 15;
		map[14][13] = 18;
	}
	
	public int myGetDistance(int start, int end)
	{
		//m is the current index, start is where we started
		int m = end;
		int total = 0;
		//If the first searched nodes are the correct node, then return the distance between those and nothing else
		if (map[start][end] > 0)
		{
			return map[start][end];
		}
		//while the start and current index nodes aren't connected, increment the current index until there is a match with something. Then feeds those new nodes back into the while loop
		while (map[start][m] == 0)
		{
			if (m == 15) m = -1;
			m += 1;
			while (map[start][m] == 0) m += 1;
			total += map[start][m];
			start = m;
			m = end;
			if (map[start][m] > 0)
			{
				total += map[start][end];
				return total;
			}
		}
		
		return 0;
	}
	
	public int dijkstraPath(int s, int k)
	{
		//Create a local int array that ties along with a boolean array to correlate whether that node has been visited or not
		int dist[] = new int[15];
		int[][] graph = map;
		int src = s;
		Boolean[] sptSet = new Boolean[15];
		for (int i = 0; i < 15; i++)
		{
			//Set each value for the int array is set to max, so every number is less than that value. The boolean array is then set all to false
			dist[i] = Integer.MAX_VALUE;
			sptSet[i] = false;
		}
		//The distance to the source node is always 0
		dist[src] = 0;
		//For loop counting for the size - 1 of the 2dimensional array
		for (int count = 0; count < 14; count++)
		{
			//find the min distance between the source and the current index' node. Then set that node to true in the boolean array
			int min = minDist(dist, sptSet);
			sptSet[min] = true;
			
			for (int i = 0; i < 15; i++)
			{
				if (!sptSet[i] && graph[min][i] != 0 && dist[min] != Integer.MAX_VALUE && dist[min] + graph[min][i] < dist[i])
				{
					dist[i] = dist[min] + graph[min][i];
				}
			}
		}
		//Return the value of the minimum distance for k
		return dist[k];
	}
	
	private int minDist(int[] dist, Boolean[] sptSet)
	{
		int min = Integer.MAX_VALUE;
		int min_index = -1;
		
		for (int i = 0; i < 15; i++)
		{
			if (sptSet[i] == false && dist[i] <= min)
			{
				min = dist[i];
				min_index = i;
			}
		}
		return min_index;
	}
	
	/*private int numberNeighbors(int i)
	{
		int count = 0;
		for (int j = 0; j < 15; j++)
		{
			if (map[i][j] != 0) count++;
		}
		return count;
	}*/
	
	//simple display for a 2 dimensional array
	public void display()
	{
		for (int i = 0; i < 15; i++)
		{
			for (int j = 0; j < 15; j++)
			{
				System.out.print(map[i][j] + " ");
			}
			System.out.println();
		}
	}
	//prints out each node a node is connected to
	public void getNeighbor(int i)
	{
		for (int j = 0; j < 15; j++)
		{
			if (map[i][j] != 0) System.out.print(j + " ");
		}
		System.out.println();
	}
}
