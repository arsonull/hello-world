package project6;

public class Tree
{
	Node root;
	static int counter = 0;
	
	//Possible constructor with String List??
	public Tree()
	{
		root = null;
	}
	public Tree(Node root)
	{
		this.root = root;
	}
	
	public Node getRoot()
	{
		return root;
	}
	
	public void addNode(Node n)
	{
		if (root != null)
		{
			if (n.getData().compareTo(root.getData()) < 0)
			{
				if (root.hasLeft())
				{
					if (addNode(n, root.getLeft()))
					{
						//System.out.println("Succesful addition right of root");
					}
					else
					{
						//System.out.println("Failed addition");
					}
				}
				else
				{
					root.addLeft(n);
				}
			}
			else if (n.getData().compareTo(root.getData()) > 0)
			{
				if (root.hasRight())
				{
					if (addNode(n, root.getRight()))
					{
						//System.out.println("Succesful addition left of root");
					}
					else
					{
						//System.out.println("Failed addition");
					}
				}
				else
				{
					root.addRight(n);
				}
			}
			else
			{
				System.out.println("Already exists as root");
			}
		}
		else
		{
			root = n;
		}
	}
	private boolean addNode(Node n, Node r)
	{
		if (n.getData().compareTo(r.getData()) < 0)
		{
			if (r.hasLeft())
			{
				if (addNode(n, r.getLeft()))
				{
					//System.out.println("Succesful addition left of " + r.getData());
				}
				else
				{
					//System.out.println("Failed addition");
				}
			}
			else
			{
				r.addLeft(n);
			}
		}
		else if (n.getData().compareTo(r.getData()) > 0)
		{
			if (r.hasRight())
			{
				if (addNode(n, r.getRight()))
				{
					//System.out.println("Succesful addition right of " + r.getData());
				}
				else
				{
					//System.out.println("Failed addition");
				}
			}
			else
			{
				r.addRight(n);
			}
		}
		return false;
	}
	
	public void display()
	{
		if (root.hasLeft()) displayHelper(root.getLeft());
		System.out.print(root.getData() + " ");
		if (root.hasRight()) displayHelper(root.getRight());
		System.out.println();
	}
	private void displayHelper(Node r)
	{
		if (r.hasLeft()) displayHelper(r.getLeft());
		System.out.print(r.getData() + " ");
		if (r.hasRight()) displayHelper(r.getRight());
	}
	
	public String search(String s)
	{
		counter = 1;
		if (root.getData().compareTo(s) == 0) return "" + s + " was found at the root";
		else
		{
			if (s.compareTo(root.getData()) < 0)
			{
				if (searchHelper(s, root.getLeft()) && root.hasLeft())
				{
					return "" + s + " was found after " + counter + " nodes";
				}
				else
				{
					return "" + s + " was not found after " + counter + " nodes";
				}
			}
			else if (s.compareTo(root.getData()) > 0)
			{
				if (searchHelper(s, root.getRight()) && root.hasRight())
				{
					return "" + s + " was found after " + counter + " nodes";
				}
				else
				{
					return "" + s + " was not found after " + counter + " nodes";
				}
			}
		}
		return "" + s + " was not found";
	}
	private boolean searchHelper(String s, Node n)
	{
		int c = s.compareTo(n.getData());
		if (c == 0) return true;
		else
		{
			counter ++;
			if (c < 0 && n.hasLeft()) return searchHelper(s, n.getLeft());
			else if (c > 0 && n.hasRight()) return searchHelper(s, n.getRight());
			else return false;
		}
	}
	
	public void delete(String s)
	{
		root = deleteHelper(s, root);
	}
	
	private Node deleteHelper(String s, Node n)
	{
		//Solves null pointers
		if (n == null) return n;
		//Iterates through the tree
		if (s.compareTo(n.getData()) < 0)
		{
			n.addLeft(deleteHelper(s, n.getLeft()));
		}
		else if (s.compareTo(n.getData()) > 0)
		{
			n.addRight(deleteHelper(s, n.getRight()));
		}
		//This is the node we are looking for to delete
		else
		{
			//If node has only a right node, or no nodes
			if (!n.hasLeft()) return n.getRight();
			//if node has no nodes
			else if (!n.hasRight()) return n.getLeft();
			
			//Node has both left and right node
			//This Node is the minimum value to replace the deleted node
			Node m = minVal(n.getRight());
			n.setData(m.getData());
			//Deletes the node that's replacing the deleted node
			n.addRight(deleteHelper(s, n.getRight()));
		}
		return n;
	}
	//This gets the node we're doing to delete
	private Node searchNode(String s, Node n)
	{
		int c = s.compareTo(n.getData());
		if (c == 0) return n;
		else
		{
			if (c > 0 && n.hasLeft()) return searchNode(s, n.getLeft());
			else if (c < 0 && n.hasRight()) return searchNode(s, n.getRight());
			else return null;
		}
		
	}
	//This gets the node we're going to place the deleted node with
	private Node minVal(Node n)
	{
		while (n.getLeft().hasLeft())
		{
			n = n.getLeft();
		}
		return n;
	}
	
	private Node minValRight(Node n)
	{
		while (n.getRight().hasRight())
		{
			n = n.getRight();
		}
		return n;
	}
}
