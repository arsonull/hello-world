package project8;

public class Driver
{
	public static void main(String[] args)
	{
		Map map = new Map();
		map.display();
		map.getNeighbor(3);
		System.out.println("The distance between 0 and 7 is " + map.myGetDistance(0, 7));
		System.out.println("The shortest distance between 1 and 9 is " + map.dijkstraPath(1, 9));
		System.out.println("The shortest distance between 12 and 3 is " + map.dijkstraPath(12, 3));
	}
}
