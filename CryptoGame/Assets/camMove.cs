using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class camMove : MonoBehaviour
{

    private int difficulty; 
    void Start()
    {
        GameObject roadMaster = GameObject.Find("RoadMaster");
        RoadConstruct roadConstruct = roadMaster.GetComponent<RoadConstruct>();
        roadConstruct.difficulty = difficulty;


        switch(difficulty)
        {
            case 0:
                // EASY MODE
            GetComponent<Rigidbody>().velocity = new Vector3(0, 0, 3);

                break;

            case 1:
                // NORMAL MODE
                GetComponent<Rigidbody>().velocity = new Vector3(0, 0, 6);

                break;

            case 2:
                // HARD MODE
                GetComponent<Rigidbody>().velocity = new Vector3(0, 0, 9);

                break;
        }

        GetComponent<Rigidbody>().velocity = new Vector3(0, 0, 6);
    }

    void Update()
    {
        
    }
}
