using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SpawnPoint : MonoBehaviour
{
    public GameObject rock;
    void Start()
    {
        Instantiate(rock, transform.position, Quaternion.identity);
    }
}
