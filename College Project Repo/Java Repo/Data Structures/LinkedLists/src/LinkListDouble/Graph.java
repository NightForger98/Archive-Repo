package LinkListDouble;

import java.util.Scanner;

public class Graph {
	final private int v;
	private int e;
	private BagLinkedList<Integer> [] adj{
		Graph(int V){
			this.v = V;
			e = 0;
			adj = (BagLinkedList<Integer>[]) new BagLinkedList[V];
			for(int vertex = 0 ; vertex < V; vertex++) {
				adj[vertex] = new BagLinkedList<Integer>();
				
			}
		}
		Graph(Scanner in){
			this(in.nextInt());
			e =  in.nextInt();
			for(int i = 0; i<e; i++) {
				int v = in.nextInt();
				int w = in.nextInt();
				addEdge(v,w);
			}
		}
		public void addEdge(int v, int w) {
			adj[v].add(w);
			adj[w].add(v);
		}
		public Iterable<Integer> adj (int v){
			return adj [v];
		}
		//edges adjacency matrix, small edges=Undirected graphs: linkedlist, adjacency matrix(Fastest V, uses most memory V^2), adjacency list(slower but good memory(E + V);
		// tremaux maze exploration , ball of string behind when approach dead end go back choose next path, until no new paths are available
		//goal : traverse all
		//DFS; Recursive: visit v then recursive w(other verticies)
		//
	}


